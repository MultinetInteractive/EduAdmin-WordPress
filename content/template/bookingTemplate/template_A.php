<?php
// phpcs:disable WordPress.NamingConventions,Squiz
ob_start();
global $wp_query;
$api_key = get_option( 'eduadmin-api-key' );

if ( ! $api_key || empty( $api_key ) ) {
	echo 'Please complete the configuration: <a href="' . esc_url( admin_url() . 'admin.php?page=eduadmin-settings' ) . '">EduAdmin - Api Authentication</a>';
} else {
	include_once 'course-info.php';
	if ( ! empty( $_POST['edu-valid-form'] ) && wp_verify_nonce( $_POST['edu-valid-form'], 'edu-booking-confirm' ) && isset( $_POST['act'] ) && 'bookCourse' === sanitize_text_field( $_POST['act'] ) ) {
		$error_list = apply_filters( 'edu-booking-error', array() );
		if ( ! empty( $error_list ) ) {
			echo '<div class="eduadmin">';
			foreach ( $error_list as $error ) {
				?>
				<div class="edu-modal warning">
					<?php echo esc_html( $error ); ?>
				</div>
				<?php
			}
			do_action( 'eduadmin-bookingerror', $error_list );
			echo '</div>';
		} else {
			$ebi = $GLOBALS['edubookinginfo'];
			do_action( 'eduadmin-processbooking', $ebi );
			do_action( 'eduadmin-bookingcompleted' );
		}
	} elseif ( ! empty( $_GET['edu-valid-form'] ) && wp_verify_nonce( $_GET['edu-valid-form'], 'edu-booking-confirm' ) && isset( $_GET['act'] ) && 'paymentCompleted' === sanitize_text_field( $_GET['act'] ) ) {
		do_action( 'eduadmin-bookingcompleted' );
	} else {
		$contact  = new EduAdmin_Data_ContactPerson();
		$customer = new EduAdmin_Data_Customer();

		$discount_percent             = 0.0;
		$participant_discount_percent = 0.0;
		$customer_invoice_email       = '';

		$inc_vat = EDUAPI()->REST->Organisation->GetOrganisation()['PriceIncVat'];

		if ( isset( EDU()->session['eduadmin-loginUser'] ) ) {
			$user     = EDU()->session['eduadmin-loginUser'];
			$contact  = $user->Contact;
			$customer = $user->Customer;
		}

		$unique_prices = array();

		foreach ( $event['PriceNames'] as $price ) {
			$unique_prices[ $price['PriceNameDescription'] ] = $price;
		}

		// PriceNameVat
		$first_price = current( $unique_prices );

		$hide_sub_event_date_info = get_option( 'eduadmin-hideSubEventDateTime', false );
		?>

		<div class="eduadmin booking-page">
			<form action="" method="post" id="edu-booking-form">
				<input type="hidden" name="act" value="bookCourse" />
				<input type="hidden" name="edu-valid-form" value="<?php echo esc_attr( wp_create_nonce( 'edu-booking-confirm' ) ); ?>" />
				<a href="../" class="backLink"><?php esc_html_e( '« Go back', 'eduadmin-booking' ); ?></a>

				<div class="title">
					<?php if ( ! empty( $selected_course['ImageUrl'] ) ) : ?>
						<img class="courseImage" src="<?php echo esc_url( $selected_course['ImageUrl'] ); ?>" />
					<?php endif; ?>
					<h1 class="courseTitle">
						<?php echo esc_html( $name ); ?>
					</h1>
					<?php require_once 'event-selector.php'; ?>
				</div>
				<?php
				if ( isset( EDU()->session['eduadmin-loginUser'] ) ) {
					$user_val = '';
					if ( isset( $contact->PersonId ) && $contact->PersonId > 0 ) {
						$user_val = trim( $contact->FirstName . ' ' . $contact->LastName );
					} else {
						$selected_login_field = get_option( 'eduadmin-loginField', 'Email' );
						switch ( $selected_login_field ) {
							case 'Email':
								$user_val = $contact->Email;
								break;
							case 'CivicRegistrationNumber':
								$user_val = $contact->CivicRegistrationNumber;
								break;
							default:
								$user_val = $contact->Email;
								break;
						}
					}
					$surl     = get_home_url();
					$cat      = get_option( 'eduadmin-rewriteBaseUrl' );
					$base_url = $surl . '/' . $cat;
					?>
					<div class="notUserCheck">
						<i>
							<?php
							/* translators: 1: User display name 2: Beginning of link 3: End of link */
							echo wp_kses( sprintf( __( 'Not <b>%1$s</b>? %2$sLog out%3$s', 'eduadmin-booking' ), esc_html( $user_val ), '<a href="' . esc_url( $base_url . '/profile/logout' ) . '">', '</a>' ), wp_kses_allowed_html( 'post' ) );
							?>
						</i>
					</div>
					<?php
				}
				?>
				<?php
				$no_invoice_free_events         = get_option( 'eduadmin-noInvoiceFreeEvents', false );
				$single_person_booking          = get_option( 'eduadmin-singlePersonBooking', false );
				$show_invoice_email             = isset( $attributes['hideinvoiceemailfield'] ) ? false == $attributes['hideinvoiceemailfield'] : false == get_option( 'eduadmin-hideInvoiceEmailField', false );
				$force_show_invoice_information = isset( $attributes['showinvoiceinformation'] ) ? false == $attributes['showinvoiceinformation'] : true == get_option( 'eduadmin-showInvoiceInformation', false );
				if ( $single_person_booking ) {
					include_once 'single-person-booking.php';
				} else {
					$field_order = get_option( 'eduadmin-fieldOrder', 'contact_customer' );
					if ( 'contact_customer' === $field_order ) {
						include_once 'contact-view.php';
						include_once 'customer-view.php';
					} elseif ( 'customer_contact' === $field_order ) {
						include_once 'customer-view.php';
						include_once 'contact-view.php';
					}
					include_once 'participant-view.php';
				}
				?>
				<?php if ( 'selectWholeEvent' === get_option( 'eduadmin-selectPricename', 'firstPublic' ) ) : ?>
					<div class="priceView">
						<?php esc_html_e( 'Price name', 'eduadmin-booking' ); ?>
						<select id="edu-pricename" name="edu-pricename" required class="edudropdown edu-pricename" onchange="eduBookingView.UpdatePrice();">
							<option data-price="0" value=""><?php esc_html_e( 'Choose price', 'eduadmin-booking' ); ?></option>
							<?php foreach ( $event['PriceNames'] as $price ) : ?>
								<option data-price="<?php echo esc_attr( $price['Price'] ); ?>" date-discountpercent="<?php echo esc_attr( $price['DiscountPercent'] ); ?>" data-pricelnkid="<?php echo esc_attr( $price['PriceNameId'] ); ?>" data-maxparticipants="<?php echo esc_attr( $price['MaxParticipantNumber'] ); ?>" data-currentparticipants="<?php echo esc_attr( $price['NumberOfParticipants'] ); ?>"
									<?php if ( ! empty( $price['MaxParticipantNumber'] ) && $price['NumberOfParticipants'] >= $price['MaxParticipantNumber'] ) { ?>
										disabled
									<?php } ?>
									value="<?php echo esc_attr( $price['PriceNameId'] ); ?>">
									<?php echo esc_html( $price['PriceNameDescription'] ); ?>
									(<?php echo esc_html( convert_to_money( $price['Price'], get_option( 'eduadmin-currency', 'SEK' ) ) . ' ' . ( $inc_vat ? __( 'inc vat', 'eduadmin-booking' ) : __( 'ex vat', 'eduadmin-booking' ) ) ); ?>
									)
								</option>
							<?php endforeach; ?>
						</select>
					</div>
				<?php endif; ?>
				<?php
				include_once 'question-view.php';
				include_once 'discount-code.php';
				include_once 'limited-discount-view.php';
				?>
				<div class="submitView">
					<?php if ( get_option( 'eduadmin-useBookingTermsCheckbox', false ) && $link = get_option( 'eduadmin-bookingTermsLink', '' ) ): ?>
						<div class="confirmTermsHolder">
							<label>
								<input type="checkbox" id="confirmTerms" name="confirmTerms" value="agree" />
								<?php
								/* translators: 1: Start of link 2: End of link */
								echo wp_kses( sprintf( __( 'I agree to the %1$sTerms and Conditions%2$s', 'eduadmin-booking' ), '<a href="' . $link . '" target="_blank">', '</a>' ), wp_kses_allowed_html( 'post' ) );
								?>
							</label>
						</div>
					<?php endif; ?>
					<div class="sumTotal">
						<?php esc_html_e( 'Total sum:', 'eduadmin-booking' ); ?>
						<span id="sumValue" class="sumValue"></span>
					</div>
					<?php if ( 0 !== $event['ParticipantNumberLeft'] ) : ?>
						<input type="submit" class="bookButton cta-btn" id="edu-book-btn" onclick="eduBookingView.UpdatePrice(); var validated = eduBookingView.CheckValidation(false); return validated;" value="<?php esc_attr_e( 'Book now', 'eduadmin-booking' ); ?>" />
					<?php else : ?>
						<div class="bookButton neutral-btn cta-disabled">
							<?php esc_html_e( 'No free spots left on this event', 'eduadmin-booking' ); ?>
						</div>
					<?php endif; ?>
					<div class="edu-modal warning" id="edu-warning-terms">
						<?php esc_html_e( 'You must accept Terms and Conditions to continue.', 'eduadmin-booking' ); ?>
					</div>
					<div class="edu-modal warning" id="edu-warning-no-participants">
						<?php esc_html_e( 'You must add some participants.', 'eduadmin-booking' ); ?>
					</div>
					<div class="edu-modal warning" id="edu-warning-missing-participants">
						<?php esc_html_e( 'One or more participants is missing a name.', 'eduadmin-booking' ); ?>
					</div>
					<div class="edu-modal warning" id="edu-warning-missing-civicregno">
						<?php esc_html_e( 'One or more participants is missing their civic registration number.', 'eduadmin-booking' ); ?>
					</div>
					<?php
					$error_list = apply_filters( 'edu-booking-error', array() );
					foreach ( $error_list as $error ) {
						?>
						<div class="edu-modal warning">
							<?php esc_html( $error ); ?>
						</div>
						<?php
					}
					?>
				</div>
			</form>
		</div>

		<?php
		$original_title = get_the_title();
		$new_title      = $name . ' | ' . $original_title;

		$discount_value = 0.0;
		if ( 0 !== $participant_discount_percent ) {
			$discount_value = ( $participant_discount_percent / 100 ) * $first_price['Price'];
		}
		?>
		<script type="text/javascript">
			var pricePerParticipant = <?php echo esc_js( round( $first_price['Price'] - $discount_value, 2 ) ); ?>;
			var discountPerParticipant = <?php echo esc_js( round( $participant_discount_percent / 100, 2 ) ); ?>;
			var totalPriceDiscountPercent = <?php echo esc_js( $discount_percent ); ?>;
			var currency = '<?php echo esc_js( get_option( 'eduadmin-currency', 'SEK' ) ); ?>';
			var vatText = '<?php echo esc_js( $inc_vat ? __( 'inc vat', 'eduadmin-booking' ) : __( 'ex vat', 'eduadmin-booking' ) ); ?>';
			var ShouldValidateCivRegNo = <?php echo esc_js( get_option( 'eduadmin-validateCivicRegNo', false ) ? 'true' : 'false' ); ?>;

			var edu_vat = {
				inc: '<?php echo esc_js( __( 'inc vat', 'eduadmin-booking' ) ); ?>',
				ex: '<?php echo esc_js( __( 'ex vat', 'eduadmin-booking' ) ); ?>'
			};
			(function () {
				var title = document.title;
				title = title.replace('<?php echo esc_js( $original_title ); ?>', '<?php echo esc_js( $new_title ); ?>');
				document.title = title;
				eduBookingView.ProgrammeBooking = false;
				eduBookingView.MaxParticipants = <?php echo esc_js( intval( $event['ParticipantNumberLeft'] ) ); ?>;
				<?php echo get_option( 'eduadmin-singlePersonBooking', false ) ? 'eduBookingView.SingleParticipant = true;' : ''; ?>
				eduBookingView.AddParticipant();
				eduBookingView.CheckPrice(false);
			})();
		</script>
		<?php
	}
}
do_action( 'eduadmin-bookingform-loaded', EDU()->session['eduadmin-loginUser'] );
$out = ob_get_clean();

return $out;
