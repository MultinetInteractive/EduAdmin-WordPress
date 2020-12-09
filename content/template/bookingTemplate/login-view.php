<?php
ob_start();
global $wp_query;
$api_key = EDU()->get_option( 'eduadmin-api-key' );

if ( ! $api_key || empty( $api_key ) ) {
	echo 'Please complete the configuration: <a href="' . esc_url( admin_url() . 'admin.php?page=eduadmin-settings' ) . '">EduAdmin - Api Authentication</a>';
} else {
	include_once 'course-info.php';
	include_once '-login-handler.php';
	?>
	<div class="eduadmin loginForm" data-courseid="<?php echo esc_attr( $selected_course['CourseTemplateId'] ); ?>"
	     data-eventid="<?php echo( isset( $_REQUEST['eid'] ) ? esc_attr( sanitize_text_field( $_REQUEST['eid'] ) ) : '' ); ?>">
		<form
			action="<?php echo( isset( $_REQUEST['eid'] ) ? '?eid=' . esc_attr( sanitize_text_field( $_REQUEST['eid'] ) ) : '' ); ?>"
			method="post">
			<a href="javascript://" onclick="eduGlobalMethods.GoBack('../', event);"
			   class="backLink"><?php echo esc_html_x( '« Go back', 'frontend', 'eduadmin-booking' ); ?></a>
			<div class="title">
				<?php if ( ! empty( $selected_course['ImageUrl'] ) ) : ?>
					<img class="courseImage" src="<?php echo esc_url( $selected_course['ImageUrl'] ); ?>" />
				<?php endif; ?>
				<h1 class="courseTitle"><?php echo esc_html( $name ); ?></h1>
				<?php require_once 'event-selector.php'; ?>
				<?php
				if ( ! $GLOBALS['noAvailableDates'] ) {
					if ( ! isset( EDU()->session['checkEmail'] ) ) {
						include_once '-check-email.php';
					} elseif ( isset( EDU()->session['checkEmail'] ) ) {
						if ( isset( EDU()->session['needsLogin'] ) && true === EDU()->session['needsLogin'] ) {
							include_once '-login-form.php';
						} else {
							unset( EDU()->session['checkEmail'] );
							unset( EDU()->session['needsLogin'] );
							?>
							<script type="text/javascript">(function () {
									location.reload(true);
								})();</script>
							<?php
						}
					}
				}
				?>
			</div>
		</form>
	</div>
	<?php
}
$out = ob_get_clean();

return $out;
