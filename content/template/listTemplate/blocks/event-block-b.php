<div class="objectBlock brick <?php echo edu_get_percent_from_values( $spots_left, $event['MaxParticipantNumber'] ); ?>">
	<?php if ( $show_images && ! empty( $object['ImageUrl'] ) ) { ?>
		<div class="objectImage" onclick="location.href = '<?php echo $base_url; ?>/<?php echo make_slugs( $name ); ?>__<?php echo $object['CourseTemplateId']; ?>/?eid=<?php echo $event['EventId']; ?><?php echo edu_get_query_string( "&" ); ?>';" style="background-image: url('<?php echo esc_url( $object['ImageUrl'] ); ?>');"></div>
	<?php } ?>
	<div class="objectName">
		<a href="<?php echo $base_url; ?>/<?php echo make_slugs( $name ); ?>__<?php echo $object['CourseTemplateId']; ?>/?eid=<?php echo $event['EventId']; ?><?php echo edu_get_query_string( "&" ); ?>"><?php
			echo esc_html( get_utf8( $name ) );
			?></a>
	</div>
	<div class="objectDescription">
		<?php
		echo get_old_start_end_display_date( $event['StartDate'], $event['EndDate'], true, $show_week_days );

		if ( ! empty( $event['City'] ) && $show_city ) {
			echo ' <span class="cityInfo">';
			echo $event['City'];
			if ( $show_event_venue && ! empty( $event['AddressName'] ) ) {
				echo '<span class="venueInfo">, ' . $event['AddressName'] . '</span>';
			}
			echo '</span>';
		}

		if ( $object['Days'] > 0 ) {
			echo
				'<div class="dayInfo">' .
				( $show_course_days ? sprintf( _n( '%1$d day', '%1$d days', $object['Days'], 'eduadmin-booking' ), $object['Days'] ) .
				                      ( $show_course_times && $event['StartDate'] != '' && $event['EndDate'] != '' && ! isset( $event_dates[ $event['EventId'] ] ) ? ', ' : '' ) : '' ) .
				( $show_course_times && $event['StartDate'] != '' && $event['EndDate'] != '' && ! isset( $event_dates[ $event['EventId'] ] ) ? date_i18n( "H:i", strtotime( $event['StartDate'] ) ) .
				                                                                                                                               ' - ' .
				                                                                                                                               date_i18n( "H:i", strtotime( $event['EndDate'] ) ) : '' ) .
				'</div>';
		}
		if ( $show_event_price && isset( $event['Price'] ) ) {
			if ( 0 === $event['Price'] ) {
				echo '<div class="priceInfo">' . esc_html_x( 'Free of charge', 'The course/event has no cost', 'eduadmin-booking' ) . "</div> ";
			} else {
				echo '<div class="priceInfo">' . esc_html( sprintf( _x( 'From %1$s', 'frontend', 'eduadmin-booking' ), convert_to_money( $event['Price'], $currency ) ) . edu_get_vat_text() ) . '</div> ';
			}
		}
		echo '<div class="spotsLeft"></div>';
		echo '<span class="spotsLeftInfo">' . get_spots_left( $spots_left, $event['MaxParticipantNumber'], $spot_left_option, $spot_settings, $always_few_spots ) . '</span>';
		?>
	</div>
	<div class="objectBook">
		<?php if ( $show_read_more_btn ) : ?>
			<a class="readMoreButton cta-btn" href="<?php echo esc_url( $base_url . '/' . make_slugs( $name ) . '__' . $object['CourseTemplateId'] . '/?eid=' . $event['EventId'] . edu_get_query_string( '&' ) ); ?>"><?php echo esc_html_x( 'Read more', 'frontend', 'eduadmin-booking' ); ?></a>
		<?php endif; ?>
	</div>
</div>
