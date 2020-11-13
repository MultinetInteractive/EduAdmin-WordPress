<?php
function edu_render_style_settings_page() {
	EDU()->timers[ __METHOD__ ] = microtime( true );
	if ( ! empty( $_POST['style-settings-nonce'] ) && wp_verify_nonce( $_POST['style-settings-nonce'], 'eduadmin-style-settings' ) && isset( $_POST['resetStyle'] ) ) {
		delete_option( 'eduadmin-style' );
	}
	?>
	<div class="eduadmin wrap">
		<h2><?php echo sprintf( _x( 'EduAdmin settings - %s', 'backend', 'eduadmin-booking' ), _x( 'Style', 'backend', 'eduadmin-booking' ) ); ?></h2>

		<form method="post" action="options.php" id="edu-styleform">
			<input type="hidden" name="style-settings-nonce"
			       value="<?php echo esc_attr( wp_create_nonce( 'eduadmin-style-settings' ) ); ?>" />
			<?php settings_fields( 'eduadmin-style' ); ?>
			<?php do_settings_sections( 'eduadmin-style' ); ?>
			<div class="block">
				<div id="eduadmin-style-editor"
				     style="position: relative; min-width: 1000px; width: 100%; min-height: 600px; border: 1px solid #c3c3c3;"></div>
				<textarea name="eduadmin-style" id="eduadmin-style" style="width: 100%;" cols="250" rows="40"
				          spellcheck="false"><?php
					$default_css = '';
					$css         = get_option( 'eduadmin-style', $default_css );
					echo esc_textarea( $css );
					?></textarea>

				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary"
					       value="<?php echo _x( 'Save settings', 'backend', 'eduadmin-booking' ); ?>" />
					<input type="button"
					       onclick="var c = confirm('<?php _ex( 'Are you sure you want to reset the style settings?', 'backend', 'eduadmin-booking' ); ?>'); if (c) { var f = document.getElementById('resetForm').submit(); } else { return false; }"
					       class="button button-secondary"
					       value="<?php echo esc_attr_x( 'Reset styles', 'backend', 'eduadmin-booking' ); ?>" />
				</p>
			</div>
		</form>
		<div id="saveResult"></div>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				jQuery('#edu-styleform').submit(function () {
					var data = jQuery(this).serialize();
					jQuery.post('options.php', data, function (r) {
						jQuery('#saveResult').html("<div id="
						saveMessage
						" class="
						successModal
						"></div>"
					)
						;
						jQuery('#saveMessage').append("<p><?php echo htmlentities( __( 'Settings Saved Successfully', 'eduadmin-booking' ), ENT_QUOTES ); ?></p>").show();

						setTimeout(function () {
							jQuery('#saveMessage').hide('slow');
						}, 2000);
					});
					return false;
				});
			});
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js" type="text/javascript"
		        charset="utf-8"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ext-language_tools.js" type="text/javascript"
		        charset="utf-8"></script>
		<script>
			ace.require("ace/ext/language_tools");
			var editor = ace.edit("eduadmin-style-editor");
			var textarea = jQuery('#eduadmin-style').hide();
			editor.getSession().setValue(textarea.val());
			editor.getSession().setUseWorker(false);
			editor.setTheme("ace/theme/dawn");
			editor.getSession().setMode("ace/mode/css");
			editor.getSession().on('change', function () {
				textarea.val(editor.getSession().getValue());
			});

			editor.setOptions({
				enableBasicAutocompletion: true,
				enableSnippets: false,
				enableLiveAutocompletion: true
			});
		</script>
		<form method="post" action="" id="resetForm">
			<input type="hidden" name="resetStyle" value="1" />
		</form>
	</div>
	<?php
	EDU()->timers[ __METHOD__ ] = microtime( true ) - EDU()->timers[ __METHOD__ ];
}
