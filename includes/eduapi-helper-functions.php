<?php

class EduAdminAPIHelper {
	protected static $_instance = null;

	/**
	 * @param $course_id
	 * @param $fetch_months
	 * @param $group_by_city
	 *
	 * @return string
	 */
	public function GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city ) {
		return EDU()->get_transient( 'eduadmin-object', function() use ( $course_id, $fetch_months, $group_by_city ) {
			$expands = array();
			$selects = array();

			$selects[] = 'CourseTemplateId';
			$selects[] = 'CourseName';
			$selects[] = 'InternalCourseName';
			$selects[] = 'ImageUrl';
			$selects[] = 'CourseDescription';
			$selects[] = 'CourseDescriptionShort';
			$selects[] = 'CourseGoal';
			$selects[] = 'TargetGroup';
			$selects[] = 'Prerequisites';
			$selects[] = 'CourseAfter';
			$selects[] = 'Quote';
			$selects[] = 'Days';
			$selects[] = 'StartTime';
			$selects[] = 'EndTime';
			$selects[] = 'RequireCivicRegistrationNumber';

			$expands['Subjects']   = '$select=SubjectName;';
			$expands['Categories'] = '$select=CategoryName;';
			$expands['PriceNames'] = '$filter=PublicPriceName;';
			$expands['Events']     =
				'$filter=' .
				'HasPublicPriceName' .
				' and StatusId eq 1' .
				' and CustomerId eq null' .
				' and CompanySpecific eq false' .
				' and LastApplicationDate ge ' . date( 'c', strtotime( 'now 23:59:59' ) ) .
				' and StartDate le ' . date( 'c', strtotime( 'now 23:59:59 +' . $fetch_months . ' months' ) ) .
				' and EndDate ge ' . date( 'c', strtotime( 'now' ) ) .
				';' .
				'$expand=PriceNames($filter=PublicPriceName;$select=PriceNameId,PriceNameDescription,Price,MaxParticipantNumber,NumberOfParticipants,DiscountPercent;),EventDates($orderby=StartDate;$select=StartDate,EndDate;),Sessions($expand=PriceNames($filter=PublicPriceName;);$filter=HasPublicPriceName;),PaymentMethods' .
				';' .
				'$orderby=StartDate asc' . ( $group_by_city ? ', City asc' : '' ) .
				';' .
				'$select=EventId,City,ParticipantNumberLeft,MaxParticipantNumber,StartDate,EndDate,AddressName,LocationId';

			$expands['CustomFields'] = '$filter=ShowOnWeb;$select=CustomFieldId,CustomFieldName,CustomFieldType,CustomFieldValue,CustomFieldChecked,CustomFieldDate,CustomFieldAlternativeId,CustomFieldAlternativeValue;';

			$expand_arr = array();
			foreach ( $expands as $key => $value ) {
				if ( empty( $value ) ) {
					$expand_arr[] = $key;
				} else {
					$expand_arr[] = $key . '(' . $value . ')';
				}
			}

			return wp_json_encode( EDUAPI()->OData->CourseTemplates->GetItem(
				$course_id,
				join( ',', $selects ),
				join( ',', $expand_arr )
			) );
		}, 10, $course_id, $fetch_months, $group_by_city );
	}

	public function GetCourseList( $attributes, $category_id, $city, $subjectid, $courselevel, $custom_order_by, $custom_order_by_order ) {
		$fetch_months = get_option( 'eduadmin-monthsToFetch', 6 );
		if ( ! is_numeric( $fetch_months ) ) {
			$fetch_months = 6;
		}

		$filters = array();
		$expands = array();
		$selects = array();
		$sorting = array();

		$selects[] = 'CourseTemplateId';
		$selects[] = 'CourseName';
		$selects[] = 'CategoryId';
		$selects[] = 'CategoryName';
		$selects[] = 'InternalCourseName';
		$selects[] = 'ImageUrl';
		$selects[] = 'CourseDescription';
		$selects[] = 'CourseDescriptionShort';
		$selects[] = 'CourseGoal';
		$selects[] = 'TargetGroup';
		$selects[] = 'Prerequisites';
		$selects[] = 'CourseAfter';
		$selects[] = 'Quote';
		$selects[] = 'Days';
		$selects[] = 'StartTime';
		$selects[] = 'EndTime';
		$selects[] = 'RequireCivicRegistrationNumber';

		$expands['Subjects']   = '$select=SubjectName;';
		$expands['Categories'] = '$select=CategoryName;';
		$expands['PriceNames'] = '$filter=PublicPriceName';
		$expands['Events']     =
			'$filter=' .
			'HasPublicPriceName' .
			' and StatusId eq 1' .
			' and CustomerId eq null' .
			' and CompanySpecific eq false' .
			' and LastApplicationDate ge ' . date( 'c', strtotime( 'now 23:59:59' ) ) .
			' and StartDate le ' . date( 'c', strtotime( 'now 23:59:59 +' . $fetch_months . ' months' ) ) .
			' and EndDate ge ' . date( 'c', strtotime( 'now' ) ) .
			';' .
			'$expand=PriceNames($filter=PublicPriceName;$select=PriceNameId,PriceNameDescription,Price,MaxParticipantNumber,NumberOfParticipants,DiscountPercent;)' .
			';' .
			'$orderby=StartDate asc' .
			';' .
			'$select=EventId,City,ParticipantNumberLeft,MaxParticipantNumber,StartDate,EndDate,AddressName,EventName';

		$expands['CustomFields'] = '$filter=ShowOnWeb;$select=CustomFieldId,CustomFieldName,CustomFieldType,CustomFieldValue,CustomFieldChecked,CustomFieldDate,CustomFieldAlternativeId,CustomFieldAlternativeValue;';

		$filters[] = 'ShowOnWeb';

		if ( ! empty( $category_id ) ) {
			$filters[] = 'CategoryId eq ' . $category_id;
		}

		if ( ! empty( $city ) ) {
			$filters[] = 'Events/any(e:e/LocationId eq ' . intval( $city ) . ')';
		}

		if ( isset( $attributes['subject'] ) && ! empty( $attributes['subject'] ) ) {
			$filters[] = 'Subjects/any(s:s/SubjectName eq \'' . sanitize_text_field( $attributes['subject'] ) . '\')';
		}

		if ( ! empty( $subjectid ) ) {
			$filters[]               = 'Subjects/any(s:s/SubjectId eq ' . $subjectid . ')';
			$attributes['subjectid'] = $subjectid;
		}

		if ( ! empty( $courselevel ) ) {
			$filters[] = 'CourseLevelId eq ' . $courselevel;
		}

		$sort_order = get_option( 'eduadmin-listSortOrder', 'SortIndex' );

		if ( null !== $custom_order_by ) {
			$orderby   = explode( ' ', $custom_order_by );
			$sortorder = explode( ' ', $custom_order_by_order );
			foreach ( $orderby as $od => $v ) {
				if ( isset( $sortorder[ $od ] ) ) {
					$or = $sortorder[ $od ];
				} else {
					$or = 'asc';
				}

				if ( edu_validate_column( 'course', $v ) !== false ) {
					$sorting[] = $v . ' ' . strtolower( $or );
				}
			}
		}
		if ( edu_validate_column( 'course', $sort_order ) !== false ) {
			$sorting[] = $sort_order . ' asc';
		}

		$expand_arr = array();
		foreach ( $expands as $key => $value ) {
			if ( empty( $value ) ) {
				$expand_arr[] = $key;
			} else {
				$expand_arr[] = $key . '(' . $value . ')';
			}
		}

		return EDU()->get_transient( 'eduadmin-listcourses-courses', function() use ( $selects, $filters, $expand_arr, $sorting ) {
			return EDUAPI()->OData->CourseTemplates->Search(
				join( ',', $selects ),
				join( ' and ', $filters ),
				join( ',', $expand_arr ),
				join( ',', $sorting )
			);
		}, 300, $selects, $filters, $sorting );
	}

	public function GetEventList( $attributes, $category_id, $city, $subjectid, $courselevel, $custom_order_by, $custom_order_by_order ) {
		$fetch_months = get_option( 'eduadmin-monthsToFetch', 6 );
		if ( ! is_numeric( $fetch_months ) ) {
			$fetch_months = 6;
		}

		$filters = array();
		$expands = array();
		$selects = array();

		$selects[] = 'CourseTemplateId';
		$selects[] = 'CourseName';
		$selects[] = 'InternalCourseName';
		$selects[] = 'ImageUrl';
		$selects[] = 'CourseDescription';
		$selects[] = 'CourseGoal';
		$selects[] = 'TargetGroup';
		$selects[] = 'Prerequisites';
		$selects[] = 'CourseAfter';
		$selects[] = 'Quote';
		$selects[] = 'Days';
		$selects[] = 'StartTime';
		$selects[] = 'EndTime';
		$selects[] = 'RequireCivicRegistrationNumber';

		$expands['Subjects']   = '$select=SubjectName;';
		$expands['Categories'] = '$select=CategoryName;';
		$expands['PriceNames'] = '$filter=PublicPriceName';
		$expands['Events']     =
			'$filter=' .
			'HasPublicPriceName' .
			' and StatusId eq 1' .
			' and CustomerId eq null' .
			' and CompanySpecific eq false' .
			' and LastApplicationDate ge ' . date( 'c', strtotime( 'now 23:59:59' ) ) .
			' and StartDate le ' . date( 'c', strtotime( 'now 23:59:59 +' . $fetch_months . ' months' ) ) .
			' and EndDate ge ' . date( 'c', strtotime( 'now' ) ) .
			';' .
			'$expand=PriceNames($filter=PublicPriceName;$select=PriceNameId,PriceNameDescription,Price,MaxParticipantNumber,NumberOfParticipants,DiscountPercent;),EventDates($orderby=StartDate;$select=StartDate,EndDate;)' .
			';' .
			'$orderby=StartDate asc' .
			';' .
			'$select=EventId,City,ParticipantNumberLeft,MaxParticipantNumber,StartDate,EndDate,AddressName,EventName';

		$expands['CustomFields'] = '$filter=ShowOnWeb;$select=CustomFieldId,CustomFieldName,CustomFieldType,CustomFieldValue,CustomFieldChecked,CustomFieldDate,CustomFieldAlternativeId,CustomFieldAlternativeValue;';

		$filters[] = 'ShowOnWeb';

		if ( ! empty( $category_id ) ) {
			$filters[] = 'CategoryId eq ' . $category_id;
		}

		if ( ! empty( $city ) ) {
			$filters[] = 'Events/any(e:e/LocationId eq ' . intval( $city ) . ')';
		}

		if ( isset( $attributes['subject'] ) && ! empty( $attributes['subject'] ) ) {
			$filters[] = 'Subjects/any(s:s/SubjectName eq \'' . sanitize_text_field( $attributes['subject'] ) . '\')';
		}

		if ( ! empty( $subjectid ) ) {
			$filters[]               = 'Subjects/any(s:s/SubjectId eq ' . $subjectid . ')';
			$attributes['subjectid'] = $subjectid;
		}

		if ( ! empty( $courselevel ) ) {
			$filters[] = 'CourseLevelId eq ' . $courselevel;
		}

		$order_by     = array();
		$order        = array( 1 );
		$order_option = get_option( 'eduadmin-listSortOrder', 'SortIndex' );

		if ( null !== $custom_order_by ) {
			$order_by = explode( ' ', $custom_order_by );
			if ( null !== $custom_order_by_order ) {
				$order        = array();
				$custom_order = explode( ' ', $custom_order_by_order );
				foreach ( $custom_order as $coVal ) {
					! isset( $coVal ) || $coVal === "asc" ? array_push( $order, 1 ) : array_push( $order, -1 );
				}
			}
		} else {
			if ( $order_option === "SortIndex" ) {
				$order_option = "StartDate";
			}
			array_push( $order_by, $order_option );
			array_push( $order, 1 );
		}

		$expand_arr = array();
		foreach ( $expands as $key => $value ) {
			if ( empty( $value ) ) {
				$expand_arr[] = $key;
			} else {
				$expand_arr[] = $key . '(' . $value . ')';
			}
		}

		return EDU()->get_transient( 'eduadmin-listevent-courses', function() use ( $selects, $filters, $expand_arr ) {
			return EDUAPI()->OData->CourseTemplates->Search(
				join( ',', $selects ),
				join( ' and ', $filters ),
				join( ',', $expand_arr )
			);
		}, 300, $selects, $filters );
	}

	/**
	 * @return mixed
	 */
	public function GetOrganization() {
		return EDU()->get_transient( 'eduadmin-organization', function() {
			return EDUAPI()->REST->Organisation->GetOrganisation();
		}, DAY_IN_SECONDS );
	}

	public function GetRegions() {
		return EDU()->get_transient( 'eduadmin-regions', function() {
			return EDUAPI()->OData->Regions->Search(
				'RegionId,RegionName',
				null,
				'Locations($filter=PublicLocation;$expand=LocationAddresses;$select=LocationId,City,PublicLocation;)',
				'RegionName asc'
			);
		}, DAY_IN_SECONDS );
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
}

function EDUAPIHelper() {
	return EduAdminAPIHelper::instance();
}

$GLOBALS['eduadminapihelper'] = EDUAPIHelper();
