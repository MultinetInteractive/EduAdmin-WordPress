<?php
// phpcs:disable WordPress.NamingConventions,Squiz
defined( 'ABSPATH' ) || die( 'This plugin must be run within the scope of WordPress.' );

function edu_listview_courselist() {
	if ( ! empty( $_POST['fetchmonths'] ) ) {
		$fetch_months = intval( $_POST['fetchmonths'] );
	} else {
		$fetch_months = EDU()->get_option( 'eduadmin-monthsToFetch', 6 );
	}

	if ( ! is_numeric( $fetch_months ) || 0 === $fetch_months ) {
		$fetch_months = 6;
	}

	$filters = array();
	$expands = array();
	$sorting = array();

	$expands['Events'] =
		'$filter=' .
		'HasPublicPriceName' .
		' and StatusId eq 1' .
		' and CustomerId eq null' .
		' and CompanySpecific eq false' .
		' and LastApplicationDate ge ' . date_i18n( 'c' ) .
		' and StartDate le ' . edu_get_timezoned_date( 'c', 'now 23:59:59 +' . $fetch_months . ' months' ) .
		' and EndDate ge ' . edu_get_timezoned_date( 'c', 'now' ) .
		( ! empty( $_POST['city'] ) ? ' and LocationId eq ' . intval( $_POST['city'] ) : '' ) .
		';' .
		'$top=1' .
		';' .
		'$orderby=StartDate asc' .
		';' .
		'$select=StartDate,City,BookingFormUrl,OnDemand,OnDemandPublished,ApplicationOpenDate';

	$filters[] = 'ShowOnWeb';

	$category_id = wp_unslash( sanitize_text_field( $_POST['category'] ) );

	if ( ! empty( $_POST['categorydeep'] ) ) {
		$category_id = 'deep-' . sanitize_text_field( $_POST['categorydeep'] );
	}

	if ( ! empty( $category_id ) && ! edu_starts_with( $category_id, 'deep-' ) ) {
		$filters[] = 'CategoryId eq ' . $category_id;
	} elseif ( ! empty( $category_id ) && edu_starts_with( $category_id, 'deep-' ) ) {
		$filters[] = 'Categories/any(c:c/CategoryId eq ' . str_replace( 'deep-', '', $category_id ) . ')';
	}

	if ( ! empty( $_POST['city'] ) && is_numeric( $_POST['city'] ) ) {
		$filters[] = 'Events/any(e:e/LocationId eq ' . intval( $_POST['city'] ) . ')';
	}

	if ( ! empty( $_POST['subject'] ) ) {
		$filters[] = 'Subjects/any(s:s/SubjectName eq \'' . sanitize_text_field( $_POST['subject'] ) . '\')';
	}

	if ( ! empty( $_POST['subjectid'] ) ) {
		$filters[] = 'Subjects/any(s:s/SubjectId eq ' . intval( $_POST['subjectid'] ) . ')';
	}

	if ( ! empty( $_POST['courselevel'] ) ) {
		$filters[] = 'CourseLevelId eq ' . intval( sanitize_text_field( $_POST['courselevel'] ) );
	}

	$expand_arr = array();
	foreach ( $expands as $key => $value ) {
		if ( empty( $value ) ) {
			$expand_arr[] = $key;
		} else {
			$expand_arr[] = $key . '(' . $value . ')';
		}
	}

	$edo     = EDUAPI()->OData->CourseTemplates->Search(
		'CourseTemplateId,OnDemand',
		join( ' and ', $filters ),
		join( ',', $expand_arr ),
		join( ',', $sorting )
	);
	$courses = $edo['value'];

	$return_value = array();
	foreach ( $courses as $event ) {
		if ( ! isset( $return_value[ (string) $event['CourseTemplateId'] ] ) && count( $event['Events'] ) > 0 ) {
			/* translators: 1: Next course/event date */
			if ( $event['OnDemand'] ) {
				$return_value[ (string) $event['CourseTemplateId'] ] = _x( 'On-demand', 'frontend', 'eduadmin-booking' );
			} else {
				$return_value[ (string) $event['CourseTemplateId'] ] = sprintf( _x( 'Next event %1$s', 'frontend', 'eduadmin-booking' ), edu_get_timezoned_date( 'Y-m-d', $event['Events'][0]['StartDate'] ) ) . ' ' . $event['Events'][0]['City'];
			}
		}
	}

	return rest_ensure_response( $return_value );
}

function edu_api_listview_eventlist() {
	header( 'Content-type: text/html; charset=UTF-8' );

	if ( ! empty( $_POST['fetchmonths'] ) ) {
		$fetch_months = intval( $_POST['fetchmonths'] );
	} else {
		$fetch_months = EDU()->get_option( 'eduadmin-monthsToFetch', 6 );
	}

	if ( ! is_numeric( $fetch_months ) || 0 === $fetch_months ) {
		$fetch_months = 6;
	}

	$city         = null;
	$subject_id   = null;
	$course_level = null;

	$ondemand    = $_POST['ondemand'];
	$all_courses = $_POST['allcourses'];

	$category_id = wp_unslash( sanitize_text_field( $_POST['category'] ) );

	if ( ! empty( $_POST['categorydeep'] ) ) {
		$category_id = 'deep-' . sanitize_text_field( $_POST['categorydeep'] );
	}

	if ( ! empty( $_POST['city'] ) && is_numeric( $_POST['city'] ) ) {
		$city = intval( $_POST['city'] );
	}

	if ( ! empty( $_POST['subject'] ) ) {
		$subject_id = intval( $_POST['subject'] );
	}

	if ( ! empty( $_POST['subjectid'] ) ) {
		$subject_id = intval( $_POST['subjectid'] );
	}

	if ( ! empty( $_POST['courselevel'] ) ) {
		$course_level = intval( sanitize_text_field( $_POST['courselevel'] ) );
	}

	$order_by              = array();
	$order                 = array( 1 );
	$order_option          = EDU()->get_option( 'eduadmin-listSortOrder', 'SortIndex' );
	$custom_order_by       = null;
	$custom_order_by_order = null;

	if ( ! empty( $_POST['orderby'] ) ) {
		$custom_order_by = $_POST['orderby'];
	}

	if ( ! empty( $_POST['order'] ) ) {
		$custom_order_by_order = $_POST['order'];
	}

	if ( null !== $custom_order_by ) {
		$order_by = explode( ' ', $custom_order_by );
		if ( null !== $custom_order_by_order ) {
			$order        = array();
			$custom_order = explode( ' ', $custom_order_by_order );
			foreach ( $custom_order as $coVal ) {
				! isset( $coVal ) || $coVal === "asc" ? array_push( $order, 1 ) : array_push( $order, - 1 );
			}
		}
	} else {
		if ( $order_option === "SortIndex" ) {
			$order_option = "StartDate";
		}
		array_push( $order_by, $order_option );
		array_push( $order, 1 );
	}

	$attributes = $_POST;

	if ( $all_courses ) {
		$_courses         = EDUAPIHelper()->GetEventList( $attributes, $category_id, $city, $subject_id, $course_level, $custom_order_by, $custom_order_by_order );
		$_ondemandcourses = EDUAPIHelper()->GetOnDemandEventList( $attributes, $category_id, $city, $subject_id, $course_level, $custom_order_by, $custom_order_by_order );

		$edo = [
			'value' => array_merge( $_ondemandcourses['value'], $_courses['value'] ),
		];
	} else {
		if ( ! $ondemand ) {
			$edo = EDUAPIHelper()->GetEventList( $attributes, $category_id, $city, $subject_id, $course_level, $custom_order_by, $custom_order_by_order );
		} else {
			$edo = EDUAPIHelper()->GetOnDemandEventList( $attributes, $category_id, $city, $subject_id, $course_level, $custom_order_by, $custom_order_by_order );
		}
	}

	$courses = $edo['value'];

	if ( ! empty( $_POST['search'] ) ) {
		$courses = array_filter( $courses, function( $object ) {
			$name        = ( ! empty( $object['CourseName'] ) ? $object['CourseName'] : $object['InternalCourseName'] );
			$descr_field = EDU()->get_option( 'eduadmin-layout-descriptionfield', 'CourseDescriptionShort' );
			$descr       = '';
			if ( false !== stripos( $descr_field, 'attr_' ) ) {
				$attr_id = intval( substr( $descr_field, 5 ) );
				foreach ( $object['CustomFields'] as $custom_field ) {
					if ( $attr_id === $custom_field['CustomFieldId'] ) {
						$descr = strip_tags( $custom_field['CustomFieldValue'] );
						break;
					}
				}
			} else {
				$descr = strip_tags( $object[ $descr_field ] );
			}

			$name_match  = false !== mb_stripos( $name, sanitize_text_field( $_POST['search'] ) );
			$descr_match = false !== mb_stripos( $descr, sanitize_text_field( $_POST['search'] ) );

			return ( $name_match || $descr_match );
		} );
	}

	$events = array();
	foreach ( $courses as $object ) {
		foreach ( $object['Events'] as $event ) {
			$event['CourseTemplate'] = $object;
			unset( $event['CourseTemplate']['Events'] );

			$pricenames = array();
			foreach ( $object['PriceNames'] as $pn ) {
				$pricenames[] = $pn['Price'];
			}
			foreach ( $event['PriceNames'] as $pn ) {
				$pricenames[] = $pn['Price'];
			}

			$min_price      = min( $pricenames );
			$event['Price'] = $min_price;

			$event = array_merge( $event['CourseTemplate'], $event );

			$events[] = $event;
		}
	}

	$filter_city = wp_unslash( sanitize_text_field( $_POST['filtercity'] ) );

	if ( ! empty( $filter_city ) ) {
		$events = array_filter( $events, function( $object ) use ( &$filter_city ) {
			return mb_stripos( $object['City'], $filter_city ) !== false;
		} );
	}

	if ( ! empty( $_POST['edu-region'] ) ) {
		$regions = EDUAPIHelper()->GetRegions();

		$_GET['edu-region'] = $_POST['edu-region'];

		$matching_regions = array_filter( $regions['value'], function( $region ) {
			$name       = make_slugs( $region['RegionName'] );
			$name_match = mb_stripos( $name, sanitize_text_field( $_POST['edu-region'] ) ) !== false;

			return $name_match;
		} );

		$matching_locations = array();
		foreach ( $matching_regions as $reg ) {
			foreach ( $reg['Locations'] as $loc ) {
				$matching_locations[] = $loc['LocationId'];
			}
		}

		$events = array_filter( $events, function( $event ) use ( &$matching_locations ) {
			return in_array( $event['LocationId'], $matching_locations );
		} );
	}

	$events = sortEvents( $events, $order_by, $order );

	if ( 'A' === $_POST['template'] ) {
		edu_api_listview_eventlist_template_A( $events, $_POST );
	} elseif ( 'B' === $_POST['template'] ) {
		edu_api_listview_eventlist_template_B( $events, $_POST );
	}
	die();
}

function edu_api_listview_eventlist_template_A( $data, $request ) {
	$show_more_number   = $request['showmore'];
	$show_city          = $request['showcity'];
	$show_book_btn      = $request['showbookbtn'];
	$show_read_more_btn = $request['showreadmorebtn'];

	$show_course_days  = EDU()->get_option( 'eduadmin-showCourseDays', true );
	$show_course_times = EDU()->get_option( 'eduadmin-showCourseTimes', true );
	$show_week_days    = EDU()->get_option( 'eduadmin-showWeekDays', false );

	$show_event_price = EDU()->get_option( 'eduadmin-showEventPrice', false );
	$currency         = EDU()->get_option( 'eduadmin-currency', 'SEK' );
	$show_event_venue = EDU()->get_option( 'eduadmin-showEventVenueName', false );

	$spot_left_option = EDU()->get_option( 'eduadmin-spotsLeft', 'exactNumbers' );
	$always_few_spots = EDU()->get_option( 'eduadmin-alwaysFewSpots', '3' );
	$spot_settings    = EDU()->get_option( 'eduadmin-spotsSettings', "1-5\n5-10\n10+" );

	$show_images = EDU()->get_option( 'eduadmin-showCourseImage', true );

	$use_eduadmin_form = EDU()->is_checked( 'eduadmin-useBookingFormFromApi' );

	if ( ! empty( $request['showimages'] ) ) {
		$show_images = true;
	}

	if ( ! empty( $request['hideimages'] ) ) {
		$show_images = false;
	}

	$number_of_events = $request['numberofevents'];

	$surl     = get_home_url();
	$cat      = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );
	$base_url = $surl . '/' . $cat;

	$remove_items = array(
		'eid',
		'showweekdays',
		'phrases',
		'module',
		'baseUrl',
		'courseFolder',
		'showmore',
		'spotsleft',
		'objectid',
		'groupbycity',
		'fewspots',
		'spotsettings',
		'numberofevents',
		'showvenue',
		'order',
		'orderby',
		'ondemand',
		'allcourses',
	);

	$current_events = 0;

	foreach ( $data as $event ) {
		if ( null !== $number_of_events && $number_of_events > 0 && $current_events >= $number_of_events ) {
			break;
		}

		$name       = $event['EventName'];
		$spots_left = $event['ParticipantNumberLeft'];
		$object     = $event['CourseTemplate'];

		$event_dates = array();
		if ( ! empty( $event['EventDates'] ) ) {
			$event_dates[ (string) $event['EventId'] ] = $event['EventDates'];
		}

		include EDUADMIN_PLUGIN_PATH . '/content/template/listTemplate/blocks/event-block-a.php';
		$current_events ++;
	}
}

function edu_api_listview_eventlist_template_B( $data, $request ) {
	$show_more_number   = $request['showmore'];
	$show_city          = $request['showcity'];
	$show_book_btn      = $request['showbookbtn'];
	$show_read_more_btn = $request['showreadmorebtn'];

	$show_course_days  = EDU()->get_option( 'eduadmin-showCourseDays', true );
	$show_course_times = EDU()->get_option( 'eduadmin-showCourseTimes', true );
	$show_week_days    = EDU()->get_option( 'eduadmin-showWeekDays', false );

	$show_event_price = EDU()->get_option( 'eduadmin-showEventPrice', false );
	$currency         = EDU()->get_option( 'eduadmin-currency', 'SEK' );
	$show_event_venue = EDU()->get_option( 'eduadmin-showEventVenueName', false );

	$spot_left_option = EDU()->get_option( 'eduadmin-spotsLeft', 'exactNumbers' );
	$always_few_spots = EDU()->get_option( 'eduadmin-alwaysFewSpots', '3' );
	$spot_settings    = EDU()->get_option( 'eduadmin-spotsSettings', "1-5\n5-10\n10+" );

	$show_images = EDU()->get_option( 'eduadmin-showCourseImage', true );

	$use_eduadmin_form = EDU()->is_checked( 'eduadmin-useBookingFormFromApi' );

	if ( ! empty( $request['showimages'] ) ) {
		$show_images = true;
	}

	if ( ! empty( $request['hideimages'] ) ) {
		$show_images = false;
	}

	$number_of_events = $request['numberofevents'];

	$surl     = get_home_url();
	$cat      = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );
	$base_url = $surl . '/' . $cat;

	$remove_items = array(
		'eid',
		'showweekdays',
		'phrases',
		'module',
		'baseUrl',
		'courseFolder',
		'showmore',
		'spotsleft',
		'objectid',
		'groupbycity',
		'fewspots',
		'spotsettings',
		'numberofevents',
		'showvenue',
		'order',
		'orderby',
		'ondemand',
		'allcourses',
	);

	$current_events = 0;

	foreach ( $data as $event ) {
		if ( null !== $number_of_events && $number_of_events > 0 && $current_events >= $number_of_events ) {
			break;
		}

		$name       = $event['EventName'];
		$spots_left = $event['ParticipantNumberLeft'];
		$object     = $event['CourseTemplate'];

		$event_dates = array();
		if ( ! empty( $event['EventDates'] ) ) {
			$event_dates[ (string) $event['EventId'] ] = $event['EventDates'];
		}

		include EDUADMIN_PLUGIN_PATH . '/content/template/listTemplate/blocks/event-block-b.php';
		$current_events ++;
	}
}

function edu_api_eventlist() {
	header( 'Content-type: text/html; charset=UTF-8' );

	$object_id = $_POST['objectid'];

	$group_by_city       = $_POST['groupbycity'];
	$group_by_city_class = '';
	if ( $group_by_city ) {
		$group_by_city_class = ' noCity';
	}

	$custom_order_by       = null;
	$custom_order_by_order = null;
	if ( ! empty( $_POST['orderby'] ) ) {
		$custom_order_by = $_POST['orderby'];
	}

	if ( ! empty( $_POST['order'] ) ) {
		$custom_order_by_order = $_POST['order'];
	}

	$course_id    = $object_id;
	$fetch_months = EDU()->get_option( 'eduadmin-monthsToFetch', 6 );
	if ( ! is_numeric( $fetch_months ) ) {
		$fetch_months = 6;
	}

	$ondemand = $_POST['ondemand'];

	if ( ! $ondemand ) {
		$edo = EDUAPIHelper()->GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city );
	} else {
		$edo = EDUAPIHelper()->GetOnDemandCourseDetailInfo( $course_id, $group_by_city );
	}

	$selected_course = false;
	$name            = '';
	if ( $edo ) {
		$selected_course = json_decode( $edo, true );
		$name            = ( ! empty( $selected_course['CourseName'] ) ? $selected_course['CourseName'] : $selected_course['InternalCourseName'] );
	}

	$surl     = get_home_url();
	$cat      = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );
	$base_url = $surl . '/' . $cat;

	$events = array();

	foreach ( $selected_course['Events'] as $event ) {
		if ( ! empty( $_POST['eid'] ) ) { // Input var okay.
			if ( $event['EventId'] != $_POST['eid'] ) { // Input var okay.
				continue;
			}
		}
		$event['CourseTemplate'] = $selected_course;
		unset( $event['CourseTemplate']['Events'] );

		$pricenames = array();
		$prices     = array();
		foreach ( $selected_course['PriceNames'] as $pn ) {
			$pricenames[] = $pn;
			$prices[]     = $pn['Price'];
		}
		foreach ( $event['PriceNames'] as $pn ) {
			$pricenames[] = $pn;
			$prices[]     = $pn['Price'];
		}

		$event = array_merge( $event['CourseTemplate'], $event );

		$min_price           = min( $prices );
		$event['Price']      = $min_price;
		$event['PriceNames'] = $pricenames;

		$events[] = $event;
	}

	if ( ! empty( $_POST['edu-region'] ) ) {
		$regions = EDUAPIHelper()->GetRegions();

		$matching_regions = array_filter( $regions['value'], function( $region ) {
			$name       = make_slugs( $region['RegionName'] );
			$name_match = mb_stripos( $name, sanitize_text_field( $_POST['edu-region'] ) ) !== false;

			return $name_match;
		} );

		$matching_locations = array();
		foreach ( $matching_regions as $reg ) {
			foreach ( $reg['Locations'] as $loc ) {
				$matching_locations[] = $loc['LocationId'];
			}
		}

		$events = array_filter( $events, function( $event ) use ( &$matching_locations ) {
			return in_array( $event['LocationId'], $matching_locations );
		} );
	}

	$prices = array();

	foreach ( $selected_course['PriceNames'] as $pn ) {
		$prices[ (string) $pn['PriceNameId'] ] = $pn;
	}

	foreach ( $events as $e ) {
		foreach ( $e['PriceNames'] as $pn ) {
			$prices[ (string) $pn['PriceNameId'] ] = $pn;
		}
	}

	if ( ! empty( $_POST['city'] ) && ! is_numeric( $_POST['city'] ) ) {
		$_city  = $_POST['city'];
		$events = array_filter( $events, function( $_event ) use ( $_city ) {
			return $_event['City'] === $_city;
		} );
	}

	$order_by     = array();
	$order        = array( 1 );
	$order_option = ( ! ! $group_by_city ? 'City' : 'StartDate' );

	if ( null !== $custom_order_by ) {
		$order_by = explode( ' ', $custom_order_by );
		if ( null !== $custom_order_by_order ) {
			$order        = array();
			$custom_order = explode( ' ', $custom_order_by_order );
			foreach ( $custom_order as $coVal ) {
				! isset( $coVal ) || $coVal === "asc" ? array_push( $order, 1 ) : array_push( $order, - 1 );
			}
		}
	} else {
		$order_option = ( ! ! $group_by_city ? 'City' : 'StartDate' );

		array_push( $order_by, $order_option );
		array_push( $order, 1 );
		if ( $order_option == 'City' ) {
			array_push( $order_by, 'StartDate' );
			array_push( $order, 1 );
		}
	}

	$events = sortEvents( $events, $order_by, $order );

	$last_city = '';

	$show_more                = ! empty( $_POST['showmore'] ) ? $_POST['showmore'] : - 1;
	$spot_left_option         = $_POST['spotsleft'];
	$always_few_spots         = $_POST['fewspots'];
	$show_event_venue         = $_POST['showvenue'];
	$spot_settings            = $_POST['spotsettings'];
	$allow_interest_reg_event = ! empty( $_POST['eventinquiry'] ) && '1' === $_POST['eventinquiry'];
	$event_interest_page      = EDU()->get_option( 'eduadmin-interestEventPage' );

	$use_eduadmin_form = EDU()->is_checked( 'eduadmin-useBookingFormFromApi' );

	echo '<div class="eduadmin"><div class="event-table eventDays">';
	$i                = 0;
	$has_hidden_dates = false;
	if ( ! empty( $prices ) ) {
		foreach ( $events as $ev ) {
			if ( isset( $_POST['eid'] ) ) {
				if ( $ev['EventId'] != intval( $_POST['eid'] ) ) {
					continue;
				}
			}

			$remove_items = array(
				'eid',
				'phrases',
				'module',
				'baseUrl',
				'courseFolder',
				'showmore',
				'spotsleft',
				'objectid',
				'groupbycity',
				'fewspots',
				'spotsettings',
			);

			include EDUADMIN_PLUGIN_PATH . '/content/template/detailTemplate/blocks/event-item.php';
			$last_city = $ev['City'];
			$i ++;
		}
	}
	if ( empty( $prices ) || empty( $events ) ) {
		echo '<div class="noDatesAvailable"><i>' . esc_html_x( 'No available dates for the selected course', 'frontend', 'eduadmin-booking' ) . '</i></div>';
	}
	if ( $has_hidden_dates ) {
		echo '<div class="eventShowMore"><a class="neutral-btn" href="javascript://" onclick="eduDetailView.ShowAllEvents(\'eduev' . esc_attr( $group_by_city ? '-' . $last_city : '' ) . '\', this);">' . esc_html_x( 'Show all events', 'frontend', 'eduadmin-booking' ) . '</a></div>';
	}
	echo '</div></div>';

	exit();
}

function edu_api_loginwidget() {
	header( 'Content-type: text/html; charset=UTF-8' );
	$surl     = get_home_url();
	$cat      = EDU()->get_option( 'eduadmin-rewriteBaseUrl' );
	$base_url = $surl . '/' . $cat;

	$login_text  = $_POST['logintext'];
	$logout_text = $_POST['logouttext'];
	$guest_text  = $_POST['guesttext'];

	if ( isset( EDU()->session['eduadmin-loginUser'] ) ) {
		$user    = EDU()->session['eduadmin-loginUser'];
		$contact = $user->Contact;
	}

	if ( ! empty( EDU()->session['eduadmin-loginUser'] ) && isset( $contact ) && isset( $contact->PersonId ) && 0 !== $contact->PersonId ) {
		echo '<div class="eduadminLogin"><a href="' .
		     esc_url( $base_url . '/profile/myprofile' . edu_get_query_string( '?', array( 'eid', 'module' ) ) ) .
		     '" class="eduadminMyProfileLink">' .
		     esc_html( trim( $contact->FirstName . ' ' . $contact->LastName ) ) .
		     '</a> - <a href="' . esc_url( $base_url . '/profile/logout' . edu_get_query_string( '?', array(
			                                   'eid',
			                                   'module',
		                                   ) ) ) .
		     '" class="eduadminLogoutButton">' .
		     esc_html( ! empty( $logout_text ) ? $logout_text : _x( 'Log out', 'frontend', 'eduadmin-booking' ) ) .
		     '</a>' .
		     '</div>';
	} else {
		echo '<div class="eduadminLogin"><i>' .
		     esc_html( ! empty( $guest_text ) ? $guest_text : _x( 'Guest', 'frontend', 'eduadmin-booking' ) ) .
		     '</i> - ' .
		     '<a href="' . esc_url( $base_url . '/profile/login' . edu_get_query_string( '?', array(
			                            'eid',
			                            'module',
		                            ) ) ) .
		     '" class="eduadminLoginButton">' .
		     esc_html( ! empty( $login_text ) ? $login_text : _x( 'Log in', 'frontend', 'eduadmin-booking' ) ) .
		     '</a>' .
		     '</div>';
	}
	die();
}

function edu_api_check_coupon_code() {
	$event_id = $_POST['eventId'];
	$code     = $_POST['code'];
	$vcode    = EDUAPI()->REST->Coupon->IsValid( $event_id, $code );

	return rest_ensure_response( $vcode );
}

function edu_api_check_programme_coupon_code() {
	$programme_start_id = $_POST['programmeStartId'];
	$code               = $_POST['code'];
	$vcode              = EDUAPI()->REST->Coupon->ProgrammeStartCouponIsValid( $programme_start_id, $code );

	return rest_ensure_response( $vcode );
}
