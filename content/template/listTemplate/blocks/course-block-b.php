<div class="objectBlock brick">
	<?php if ( $show_images && ! empty( $object['ImageUrl'] ) ) { ?>
		<div class="objectImage"
		     onclick="location.href = '<?php echo esc_url( $base_url . '/' . make_slugs( $name ) . '__' . $object['CourseTemplateId'] . '/' . edu_get_query_string() ); ?>';"
		     style="background-image: url('<?php echo esc_url( $object['ImageUrl'] ); ?>');"></div>
	<?php } ?>
	<div class="objectName">
		<a href="<?php echo esc_url( $base_url . '/' . make_slugs( $name ) . '__' . $object['CourseTemplateId'] . '/' . edu_get_query_string() ); ?>"><?php echo esc_html( get_utf8( $name ) ); ?></a>
	</div>
	<div class="objectDescription">
		<?php
		if ( stripos( $descr_field, 'attr_' ) !== false ) {
			$attr_id = intval( substr( $descr_field, 5 ) );
			foreach ( $object['CustomFields'] as $custom_field ) {
				if ( $attr_id === $custom_field['CustomFieldId'] ) {
					$descr = strip_tags( $custom_field['CustomFieldValue'] );
					break;
				}
			}
		} else {
			if ( $object[ $descr_field ] != null ) {
				$descr = strip_tags( $object[ $descr_field ] );
			} else {
				$descr = null;
			}
		}

		if ( $show_descr ) {
			if ( $descr != null ) {
				echo '<div class"courseDescription">' . wp_kses( $descr, array(
						'br' => array(),
						'p'  => array(),
					) ) . '</div>';
			}
		}

		if ( $show_course_locations && ! empty( $event_cities ) && $show_city ) {
			$cities = join( ', ', array_keys( $event_cities ) );
			echo '<div class="locationInfo">' . esc_html( $cities ) . '</div> ';
		}

		if ( $show_next_event_date ) {
			echo '<div class="nextEventDate" data-eduwidget="courseitem-date" data-objectid="' . esc_attr( $object['CourseTemplateId'] ) . '">';
			if ( ! empty( $sorted_events ) ) {
				$next_event = current( $sorted_events );
				edu_course_listitem_nextdate( $next_event );
			} else {
				echo '<i>' . _x( 'No coming events', 'frontend', 'eduadmin-booking' ) . '</i>';
			}
			echo '</div> ';
		}

		if ( $show_event_price && ! empty( $prices ) ) {
			ksort( $prices );
			$cheapest = current( $prices );
			echo '<div class="priceInfo">' . sprintf( _x( 'From %1$s', 'frontend', 'eduadmin-booking' ), edu_get_price( $cheapest['Price'], $object['ParticipantVat'] ) ) . "</div> ";
		}

		if ( $object['Days'] > 0 ) {
			echo
				'<div class="dayInfo">' .
				( $show_course_days ? sprintf( _n( '%1$d day', '%1$d days', $object['Days'], 'eduadmin-booking' ), $object['Days'] ) . ( $show_course_times ? ', ' : '' ) : '' ) .
				( $show_course_times ? $object['StartTime'] .
				                       ' - ' .
				                       $object['EndTime'] : '' ) .
				'</div>';
		}
		?>
	</div>
	<div class="objectBook">
		<?php if ( $show_read_more_btn ) : ?>
			<a class="readMoreButton cta-btn"
			   href="<?php echo $base_url; ?>/<?php echo make_slugs( $name ); ?>__<?php echo $object["CourseTemplateId"]; ?>/<?php echo edu_get_query_string(); ?>"><?php _ex( 'Read more', 'frontend', 'eduadmin-booking' ); ?></a>
		<?php endif; ?>
	</div>
</div>
