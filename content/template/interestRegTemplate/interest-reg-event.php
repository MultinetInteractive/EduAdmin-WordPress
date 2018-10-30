<?php
ob_start();
global $wp_query;
$api_key = get_option( 'eduadmin-api-key' );

if ( ! $api_key || empty( $api_key ) ) {
	echo 'Please complete the configuration: <a href="' . admin_url() . 'admin.php?page=eduadmin-settings">EduAdmin - Api Authentication</a>';
} else {
	if ( ! empty( $_POST['edu-interest-nonce'] ) && wp_verify_nonce( $_POST['edu-interest-nonce'], 'edu-event-interest' ) && isset( $_POST['act'] ) && 'eventInquiry' === sanitize_text_field( $_POST['act'] ) ) {
		include_once 'send-event-inquiry.php';
	}

	$course_id     = $wp_query->query_vars['courseId'];
	$group_by_city = get_option( 'eduadmin-groupEventsByCity', false );
	$fetch_months  = get_option( 'eduadmin-monthsToFetch', 6 );
	if ( ! is_numeric( $fetch_months ) ) {
		$fetch_months = 6;
	}
	$edo = json_decode( EDUAPIHelper()->GetCourseDetailInfo( $course_id, $fetch_months, $group_by_city ), true );

	$selected_course = false;
	$name            = '';
	if ( $edo ) {
		$name            = ( ! empty( $edo['CourseName'] ) ? $edo['CourseName'] : $edo['InternalCourseName'] );
		$selected_course = $edo;
	}

	if ( ! $selected_course ) {
		?>
		<script>history.go(-1);</script>
		<?php
		die();
	}

	$events = $selected_course['Events'];

	if ( empty( $events ) ) {
		?>
		<script>history.go(-1);</script>
		<?php
		die();
	}

	if ( ! empty( $_REQUEST['eid'] ) && is_numeric( $_REQUEST['eid'] ) ) {
		foreach ( $events as $_event ) {
			if ( $_event['EventId'] === intval( $_REQUEST['eid'] ) ) {
				$event = $_event;
				break;
			}
		}
	} else {
		$event = $events[0];
	}

	?>
	<div class="eduadmin">
		<a href="../../" class="backLink"><?php esc_html_e( '« Go back', 'eduadmin-booking' ); ?></a>
		<div class="title">
			<?php if ( ! empty( $selected_course['ImageUrl'] ) ) : ?>
				<img src="<?php echo esc_url( $selected_course['ImageUrl'] ); ?>" class="courseImage" />
			<?php endif; ?>
			<h1 class="courseTitle"><?php echo esc_html( $name ); ?> - <?php esc_html_e( 'Inquiry', 'eduadmin-booking' ); ?></h1>
		</div>
		<?php
		echo '<div class="dateInfo">' . wp_kses_post( get_old_start_end_display_date( $event['StartDate'], $event['EndDate'] ) ) . ', ';
		echo esc_html( date( 'H:i', strtotime( $event['StartDate'] ) ) );
		?>
		-
		<?php
		echo esc_html( date( 'H:i', strtotime( $event['EndDate'] ) ) );

		echo esc_html( edu_output_event_venue( array( $event['AddressName'], $event['City'] ), '&nbsp;' ) );

		echo '</div>';
		?>
		<hr />
		<div class="textblock">
			<?php esc_html_e( 'Please fill out the form below to send a inquiry to us about this course.', 'eduadmin-booking' ); ?>
			<hr />
			<form action="" method="POST">
				<input type="hidden" name="edu-interest-nonce" value="<?php echo esc_attr( wp_create_nonce( 'edu-event-interest' ) ); ?>" />
				<input type="hidden" name="objectid" value="<?php echo esc_attr( $selected_course['CourseTemplateId'] ); ?>" />
				<input type="hidden" name="eventid" value="<?php echo esc_attr( $event['EventId'] ); ?>" />
				<input type="hidden" name="act" value="eventInquiry" />
				<input type="hidden" name="email" />
				<label>
					<div class="inputLabel"><?php esc_html_e( 'Customer name', 'eduadmin-booking' ); ?> *</div>
					<div class="inputHolder">
						<input type="text" required name="edu-companyName" placeholder="<?php esc_attr_e( 'Customer name', 'eduadmin-booking' ); ?>" />
					</div>
				</label>
				<label>
					<div class="inputLabel"><?php esc_html_e( 'Contact name', 'eduadmin-booking' ); ?> *</div>
					<div class="inputHolder" style="display: flex;">
						<input type="text" required name="edu-contactFirstName" class="first-name" placeholder="<?php esc_attr_e( 'Contact first name', 'eduadmin-booking' ); ?>" />
						<input type="text" required name="edu-contactLastName" class="last-name" placeholder="<?php esc_attr_e( 'Contact surname', 'eduadmin-booking' ); ?>" />
					</div>
				</label>
				<label>
					<div class="inputLabel"><?php esc_html_e( 'E-mail address', 'eduadmin-booking' ); ?> *</div>
					<div class="inputHolder">
						<input type="email" required name="edu-emailAddress" placeholder="<?php esc_attr_e( 'E-mail address', 'eduadmin-booking' ); ?>" />
					</div>
				</label>
				<label>
					<div class="inputLabel"><?php esc_html_e( 'Phone number', 'eduadmin-booking' ); ?></div>
					<div class="inputHolder">
						<input type="tel" name="edu-phone" placeholder="<?php esc_attr_e( 'Phone number', 'eduadmin-booking' ); ?>" />
					</div>
				</label>
				<label>
					<div class="inputLabel"><?php esc_html_e( 'Mobile number', 'eduadmin-booking' ); ?></div>
					<div class="inputHolder">
						<input type="tel" name="edu-mobile" placeholder="<?php esc_attr_e( 'Mobile number', 'eduadmin-booking' ); ?>" />
					</div>
				</label>
				<label>
					<div class="inputLabel"><?php esc_html_e( 'Notes', 'eduadmin-booking' ); ?></div>
					<div class="inputHolder">
						<textarea name="edu-notes" placeholder="<?php esc_attr_e( 'Notes', 'eduadmin-booking' ); ?>"></textarea>
					</div>
				</label>
				<?php if ( get_option( 'eduadmin-singlePersonBooking', false ) ) { ?>
					<input type="hidden" name="edu-participants" value="1" />
				<?php } else { ?>
					<label>
						<div class="inputLabel"><?php esc_html_e( 'Participants', 'eduadmin-booking' ); ?> *</div>
						<div class="inputHolder">
							<input type="number" min="1" required name="edu-participants" placeholder="<?php esc_attr_e( 'Participants', 'eduadmin-booking' ); ?>" />
						</div>
					</label>
				<?php } ?>
				<input type="submit" class="bookButton cta-btn" value="<?php esc_attr_e( 'Send inquiry', 'eduadmin-booking' ); ?>" />
			</form>
		</div>
	</div>
	<?php
	$original_title = get_the_title();
	$new_title      = $name . ' | ' . $original_title;
	?>
	<script type="text/javascript">
		(function () {
			var title = document.title;
			title = title.replace('<?php echo esc_js( $original_title ); ?>', '<?php echo esc_js( $new_title ); ?>');
			document.title = title;
		})();
	</script>
	<?php
}

$out = ob_get_clean();

return $out;
