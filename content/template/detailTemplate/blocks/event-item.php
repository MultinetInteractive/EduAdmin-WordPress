<?php
if ( $group_by_city && $last_city !== $ev['City'] ) {
	$i = 0;
	if ( $has_hidden_dates ) {
		echo '<div class="eventShowMore"><a class="neutral-btn" href="javascript://" onclick="eduDetailView.ShowAllEvents(\'eduev-' . esc_attr( $last_city ) . '\', this);">' . esc_html__( 'Show all events', 'eduadmin-booking' ) . '</a></div>';
	}
	$has_hidden_dates = false;
	echo '<div class="eventSeparator">' . esc_html( $ev['City'] ) . '</div>';
}

if ( $show_more > 0 && $i >= $show_more ) {
	$has_hidden_dates = true;
}

$event_dates = array();
if ( ! empty( $ev['EventDates'] ) ) {
	$event_dates[ $ev['EventId'] ] = $ev['EventDates'];
}

?>
<div data-groupid="eduev<?php echo( $group_by_city ? '-' . esc_attr( $ev['City'] ) : '' ); ?>" class="eventItem<?php echo( $show_more > 0 && $i >= $show_more ? ' showMoreHidden' : '' ); ?>">
	<div class="eventDate<?php echo esc_attr( $group_by_city_class ); ?>">
		<?php
		echo isset( $event_dates[ $ev['EventId'] ] ) ? get_logical_date_groups( $event_dates[ $ev['EventId'] ] ) : wp_kses_post( get_old_start_end_display_date( $ev['StartDate'], $ev['EndDate'] ) );
		echo ! isset( $event_dates[ $ev['EventId'] ] ) || 1 === count( $event_dates[ $ev['EventId'] ] ) ? '<span class="eventTime">, ' . esc_html( date( 'H:i', strtotime( $ev['StartDate'] ) ) ) . ' - ' . esc_html( date( 'H:i', strtotime( $ev['EndDate'] ) ) ) . '</span>' : '';
		?>
	</div>
	<?php if ( ! $group_by_city ) { ?>
		<div class="eventCity">
			<?php
			echo esc_html( $ev['City'] );
			if ( $show_event_venue && ! empty( $ev['AddressName'] ) ) {
				echo '<span class="venueInfo">' . esc_html( edu_output_event_venue( array( $ev['AddressName'] ), ', ' ) ) . '</span>';
			}
			?>
		</div>
	<?php } ?>
	<div class="eventStatus<?php echo esc_attr( $group_by_city_class ); ?>"
		data-spots-left="<?php echo esc_attr(intval($ev['ParticipantNumberLeft'])); ?>"
		data-max-spots="<?php echo esc_attr(intval( $ev['MaxParticipantNumber'] )); ?>"
		data-spots-left-option="<?php echo esc_attr($spot_left_option); ?>"
		data-spots-settings="<?php echo esc_attr($spot_settings); ?>"
		data-always-few-spots="<?php echo esc_attr($always_few_spots); ?>"
	>
		<?php
		$spots_left = intval( $ev['ParticipantNumberLeft'] );
		echo '<span class="spotsLeftInfo">' . esc_html( get_spots_left( $spots_left, intval( $ev['MaxParticipantNumber'] ), $spot_left_option, $spot_settings, $always_few_spots ) ) . '</span>';
		?>
	</div>
	<div class="eventBook<?php echo esc_attr( $group_by_city_class ); ?>">
		<?php
		if ( 0 === intval( $ev['MaxParticipantNumber'] ) || $spots_left > 0 ) {
			?>
			<a class="bookButton book-link cta-btn" href="<?php echo esc_url( $base_url . '/' . make_slugs( $name ) . '__' . $selected_course['CourseTemplateId'] . '/book/?eid=' . $ev['EventId'] . edu_get_query_string( '&', array( 'eid' ) ) . '&_=' . time() ); ?>"><?php esc_html_e( 'Book', 'eduadmin-booking' ); ?></a>
			<?php
		} else {
			if ( $allow_interest_reg_event && false !== $event_interest_page ) {
				?>
				<a class="inquiry-link" href="<?php echo esc_url( $base_url . '/' . make_slugs( $name ) . '__' . $selected_course['CourseTemplateId'] . '/book/interest/?eid=' . $ev['EventId'] . edu_get_query_string( '&', array( 'eid' ) ) . '&_=' . time() ); ?>"><?php esc_html_e( 'Inquiry', 'eduadmin-booking' ); ?></a>
				<?php
			}
			?>
			<i class="fullBooked"><?php esc_html_e( 'Full', 'eduadmin-booking' ); ?></i>
		<?php } ?>
	</div>
</div>
