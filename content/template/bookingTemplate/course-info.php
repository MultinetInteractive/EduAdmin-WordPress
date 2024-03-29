<?php
$r    = uniqid( 'eduadmin-timer-' );
${$r} = EDU()->start_timer( 'Booking info' );

if ( ! empty( $wp_query->query_vars['courseId'] ) ) {
	$course_id = $wp_query->query_vars['courseId'];
} elseif ( ! empty( $attributes['courseid'] ) ) {
	$course_id = $attributes['courseid'];
} else {
	$course_id = null;
}

$group_by_city = EDU()->is_checked( 'eduadmin-groupEventsByCity' );

$fetch_months = EDU()->get_option( 'eduadmin-monthsToFetch', 6 );
if ( ! is_numeric( $fetch_months ) ) {
	$fetch_months = 6;
}

$edo = EDUAPIHelper()->GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city );

$selected_course = false;
$name            = '';

if ( $edo ) {
	$selected_course = json_decode( $edo, true );
	$edo             = $selected_course;
	$name            = ( ! empty( $edo['CourseName'] ) ? $edo['CourseName'] : $edo['InternalCourseName'] );
}

$is_ondemand = $selected_course['OnDemand'];

if ( $is_ondemand ) {
	$selected_course = json_decode( EDUAPIHelper()->GetOnDemandCourseDetailInfo( $course_id, $group_by_city ), true );
}

$noAvailableDates            = false;
$GLOBALS['noAvailableDates'] = false;

if ( ! $selected_course || empty( $selected_course['Events'] ) ) {
	$noAvailableDates            = true;
	$GLOBALS['noAvailableDates'] = true;
}
$event  = null;
$events = $selected_course['Events'];

$filtered_events = [];

foreach ( $events as $_event ) {
	$skip_event = false;

	if ( $_event['ParticipantNumberLeft'] == 0 && $_event['MaxParticipantNumber'] != 0 ) {
		$skip_event = true;
	}

	if ( null != $_event['ApplicationOpenDate'] ) {
		$current_time   = current_time( 'Y-m-d H:i' );
		$event_opendate = edu_get_timezoned_date( 'Y-m-d H:i', $_event['ApplicationOpenDate'] );

		if ( $current_time <= $event_opendate ) {
			$skip_event = true;
		}
	}

	if ( ! $skip_event ) {
		$filtered_events[] = $_event;
	}
}

$events = $filtered_events;

$always_allow_change_event = EDU()->is_checked( 'eduadmin-alwaysAllowChangeEvent' );

if ( ! $noAvailableDates ) {
	$event = $events[0];
	if ( isset( $_GET['eid'] ) && is_numeric( $_GET['eid'] ) ) {
		$eventid = intval( $_GET['eid'] );
		foreach ( $events as $ev ) {
			if ( $eventid === $ev['EventId'] && edu_get_timezoned_date( 'Y-m-d H:i:s', $ev['StartDate'] ) > current_time( 'Y-m-d H:i:s' ) ) {
				$event = $ev;
				if ( ! $always_allow_change_event ) {
					$events   = array();
					$events[] = $ev;
				}
				break;
			}
		}
	}

	if ( count( $events ) != 0 ) {
		$event_id = $event['EventId'];
		$eventid  = $event_id;

		$questions = EDU()->get_transient( 'eduadmin-event_questions', function() use ( $event_id ) {
			return EDUAPI()->REST->Event->BookingQuestions( $event_id, true );
		},                                 DAY_IN_SECONDS, $event_id );

		$booking_questions     = $questions['BookingQuestions'];
		$participant_questions = $questions['ParticipantQuestions'];
	} else {
		$noAvailableDates            = true;
		$GLOBALS['noAvailableDates'] = true;
	}
}

EDU()->stop_timer( ${$r} );
