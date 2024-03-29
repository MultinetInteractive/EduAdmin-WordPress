<?php
$allow_region_search = EDU()->is_checked( 'eduadmin-allowRegionSearch', false );

$show_event_venue = EDU()->is_checked( 'eduadmin-showEventVenueName', false );
$spot_left_option = EDU()->get_option( 'eduadmin-spotsLeft', 'exactNumbers' );
$always_few_spots = EDU()->get_option( 'eduadmin-alwaysFewSpots', '3' );
$spot_settings    = EDU()->get_option( 'eduadmin-spotsSettings', "1-5\n5-10\n10+" );

$object_interest_page      = EDU()->get_option( 'eduadmin-interestObjectPage' );
$allow_interest_reg_object = EDU()->is_checked( 'eduadmin-allowInterestRegObject', false );

$event_interest_page      = EDU()->get_option( 'eduadmin-interestEventPage' );
$allow_interest_reg_event = EDU()->is_checked( 'eduadmin-allowInterestRegEvent', false );
$show_more                = ! empty( $attributes['showmore'] ) ? $attributes['showmore'] : - 1;

$use_eduadmin_form = EDU()->is_checked( 'eduadmin-useBookingFormFromApi' );

$has_hidden_dates = false;

$last_city = "";

$is_ondemand = $selected_course['OnDemand'];

if ( $use_eduadmin_form ) {
	if ( ! key_exists( 'eduadmin-booking-form-javascript-set', $GLOBALS ) && ! empty( trim( EDU()->get_option( 'eduadmin-booking-form-javascript', '' ) ) ) ) {
		?>
		<script type="text/javascript">
			<?php echo EDU()->get_option( 'eduadmin-booking-form-javascript', '' ); ?>
		</script>
		<?php
		$GLOBALS['eduadmin-booking-form-javascript-set'] = true;
	}
}

?>
<?php if ( $allow_region_search && empty( $_GET['eid'] ) && ! $is_ondemand ) : ?>
	<h3><?php esc_html_e( 'Region', 'eduadmin-booking' ); ?></h3>
	<div class="search-regionitems">
		<?php
		include EDUADMIN_PLUGIN_PATH . '/content/template/listTemplate/search/region.php';
		?>
	</div>
<?php endif; ?>
<div class="event-table eventDays" data-eduwidget="eventlist"
     data-objectid="<?php echo esc_attr( $selected_course['CourseTemplateId'] ); ?>"
     data-spotsleft="<?php echo esc_attr( $spot_left_option ); ?>"
     data-spotsettings="<?php echo esc_attr( $spot_settings ); ?>"
     data-fewspots="<?php echo esc_attr( $always_few_spots ); ?>" data-showmore="<?php echo esc_attr( $show_more ); ?>"
     data-groupbycity="<?php echo esc_attr( $group_by_city ); ?>"
     data-fetchmonths="<?php echo esc_attr( $fetch_months ); ?>"
     data-region="<?php echo esc_attr( ( ! empty( $_REQUEST['edu-region'] ) ? sanitize_text_field( $_REQUEST['edu-region'] ) : '' ) ); ?>"
	<?php echo( isset( $_GET['eid'] ) ? ' data-eid="' . intval( $_GET['eid'] ) . '"' : '' ); ?>
	 data-showvenue="<?php echo esc_attr( $show_event_venue ); ?>"
	 data-eventinquiry="<?php echo esc_attr( $allow_interest_reg_event ); ?>"
	 data-useeduform="<?php echo esc_attr( $use_eduadmin_form ); ?>"
	 data-ondemand="<?php echo esc_attr( $selected_course['OnDemand'] ); ?>">
	<?php
	$i = 0;
	if ( ! empty( $prices ) ) {
		foreach ( $events as $ev ) {
			if ( ! empty( $_GET['eid'] ) ) { // Input var okay.
				if ( $ev['EventId'] != $_GET['eid'] ) { // Input var okay.
					continue;
				}
			}
			include 'event-item.php';
			$last_city = $ev['City'];
			$i ++;
		}
	}
	if ( empty( $prices ) || empty( $events ) ) {
		?>
		<div class="noDatesAvailable">
			<i><?php echo esc_html_x( 'No available dates for the selected course', 'frontend', 'eduadmin-booking' ); ?></i>
		</div>
		<?php
	}
	if ( $has_hidden_dates ) {
		echo '<div class="eventShowMore"><a class="neutral-btn" href="javascript://" onclick="eduDetailView.ShowAllEvents(\'eduev' . esc_attr( $group_by_city ? '-' . $last_city : '' ) . '\', this);">' . esc_html_x( 'Show all events', 'frontend', 'eduadmin-booking' ) . '</a></div>';
	}
	?>
</div>
