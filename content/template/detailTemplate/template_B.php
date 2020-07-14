<?php
ob_start();
global $wp_query;
$api_key = get_option( 'eduadmin-api-key' );

if ( ! $api_key || empty( $api_key ) ) {
	echo 'Please complete the configuration: <a href="' . esc_url( admin_url() . 'admin.php?page=eduadmin-settings' ) . '">EduAdmin - Api Authentication</a>';
} else {
	include_once 'course-info.php';
	if ( ! $selected_course ) {
		?>
		<script type="text/javascript">location.href = '<?php echo esc_url( $base_url ); ?>';</script>
		<?php
		die();
	}

	?>
	<div class="eduadmin detail-view" data-courseid="<?php echo esc_attr( $selected_course['CourseTemplateId'] ); ?>" data-eventid="<?php echo( isset( $_REQUEST['eid'] ) ? esc_attr( sanitize_text_field( $_REQUEST['eid'] ) ) : '' ); ?>">
		<a href="javascript://" onclick="eduGlobalMethods.GoBack('../', event);" class="backLink"><?php echo esc_html_x( '« Go back', 'frontend', 'eduadmin-booking' ); ?></a>
		<div class="title">
			<?php if ( ! empty( $selected_course['ImageUrl'] ) ) : ?>
				<img src="<?php echo esc_url( $selected_course['ImageUrl'] ); ?>" class="courseImage" />
			<?php endif; ?>
			<h1 class="courseTitle"><?php echo esc_html( $name ); ?>
				<small class="courseLevel"><?php echo esc_html( null !== $course_level ? $course_level['Name'] : '' ); ?></small>
			</h1>
		</div>
		<hr />
		<div class="textblock leftBlock">
			<?php if ( ! in_array( 'description', $hide_sections, true ) && ! empty( $selected_course['CourseDescription'] ) ) { ?><?php if ( $show_headers ) { ?>
				<h3><?php _ex( 'Course description', 'frontend', 'eduadmin-booking' ); ?></h3>
			<?php } ?>
				<div>
					<?php
					echo $selected_course['CourseDescription'];
					?>
				</div>
			<?php } ?>
			<?php if ( ! in_array( 'goal', $hide_sections, true ) && ! empty( $selected_course['CourseGoal'] ) ) { ?><?php if ( $show_headers ) { ?>
				<h3><?php _ex( 'Course goal', 'frontend', 'eduadmin-booking' ); ?></h3>
			<?php } ?>
				<div>
					<?php
					echo $selected_course['CourseGoal'];
					?>
				</div>
			<?php } ?>
			<?php if ( ! in_array( 'target', $hide_sections, true ) && ! empty( $selected_course['TargetGroup'] ) ) { ?><?php if ( $show_headers ) { ?>
				<h3><?php _ex( 'Target group', 'frontend', 'eduadmin-booking' ); ?></h3>
			<?php } ?>
				<div>
					<?php
					echo $selected_course['TargetGroup'];
					?>
				</div>
			<?php } ?>
			<?php if ( ! in_array( 'prerequisites', $hide_sections, true ) && ! empty( $selected_course['Prerequisites'] ) ) { ?>
			<?php if ( $show_headers ) { ?>
				<h3><?php _ex( 'Prerequisites', 'frontend', 'eduadmin-booking' ); ?></h3>
			<?php } ?>
			<div>
				<?php
				echo $selected_course['Prerequisites'];
				?>
			</div>
		</div>
		<div class="textblock rightBlock">
			<?php } ?>
			<?php if ( ! in_array( 'after', $hide_sections, true ) && ! empty( $selected_course['CourseAfter'] ) ) { ?><?php if ( $show_headers ) { ?>
				<h3><?php _ex( 'After the course', 'frontend', 'eduadmin-booking' ); ?></h3>
			<?php } ?>
				<div>
					<?php
					echo $selected_course['CourseAfter'];
					?>
				</div>
			<?php } ?>
			<?php if ( ! in_array( 'quote', $hide_sections, true ) && ! empty( $selected_course['Quote'] ) ) { ?><?php if ( $show_headers ) { ?>
				<h3><?php _ex( 'Quotes', 'frontend', 'eduadmin-booking' ); ?></h3>
			<?php } ?>
				<div>
					<?php
					echo $selected_course['Quote'];
					?>
				</div>
			<?php } ?>
		</div>
		<div class="eventInformation">
			<?php if ( ! in_array( 'time', $hide_sections, true ) && ! empty( $selected_course['StartTime'] ) && ! empty( $selected_course['EndTime'] ) ) { ?>
				<h3><?php _ex( 'Time', 'frontend', 'eduadmin-booking' ); ?></h3>
				<?php
				echo ( $selected_course['Days'] > 0 ? sprintf( _n( '%1$d day', '%1$d days', $selected_course['Days'], 'eduadmin-booking' ), $selected_course['Days'] ) . ', ' : '' ) .
				     edu_get_timezoned_date( 'H:i', $selected_course['StartTime'] ) . ' - ' . edu_get_timezoned_date( 'H:i', $selected_course['EndTime'] );
			}

			if ( ! in_array( 'price', $hide_sections, true ) && ! empty( $prices ) ) {
				?>
				<h3><?php _ex( 'Price', 'frontend', 'eduadmin-booking' ); ?></h3>
				<?php
				$currency = get_option( 'eduadmin-currency', 'SEK' );
				if ( 1 === count( $prices ) ) {
					echo sprintf( '%1$s %2$s', current( $prices )['PriceNameDescription'], convert_to_money( current( $prices )['Price'], $currency ) ) . edu_get_vat_text();
				} else {
					foreach ( $prices as $up ) {
						echo sprintf( '%1$s %2$s', $up['PriceNameDescription'], convert_to_money( $up['Price'], $currency ) ) . edu_get_vat_text();
						?>
						<br />
						<?php
					}
				}
			}
			?>
		</div>
		<?php
		include( 'blocks/event-list.php' );
		if ( $allow_interest_reg_object && $object_interest_page != false ) {
			?>
			<br />
			<div class="inquiry">
				<a class="inquiry-link" href="<?php echo $base_url; ?>/<?php echo make_slugs( $name ); ?>__<?php echo $selected_course['CourseTemplateId']; ?>/interest/<?php echo edu_get_query_string( '?' ) . '&_=' . time(); ?>"><?php _ex( 'Send inquiry about this course', 'frontend', 'eduadmin-booking' ); ?></a>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}
$out = ob_get_clean();

return $out;
