<?php
ob_start();
require 'list-events.php';
$number_of_events = $attributes['numberofevents'];
$current_events   = 0;

foreach ( $events as $event ) {
	if ( null !== $number_of_events && $number_of_events > 0 && $current_events >= $number_of_events ) {
		break;
	}

	if ( $show_ondemand && ! $event['OnDemand'] ) {
		continue;
	}

	$name       = $event['EventName'];
	$spots_left = $event['ParticipantNumberLeft'];
	$object     = $event['CourseTemplate'];

	$event_dates = array();
	if ( ! empty( $event['EventDates'] ) ) {
		$event_dates[ (string) $event['EventId'] ] = $event['EventDates'];
	}

	include 'blocks/event-block-a.php';
	$current_events++;
}
?>
	</div><!-- /eventlist -->
<?php
$out = ob_get_clean();

return $out;
