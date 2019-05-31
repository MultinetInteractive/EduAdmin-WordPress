<?php
// phpcs:disable WordPress.NamingConventions

/**
 * Class EduAdminLoginHandler
 */
class EduAdmin_LoginHandler {
	/**
	 * EduAdminLoginHandler constructor.
	 */
	public function __construct() {
		add_action( 'wp_loaded', array( $this, 'process_login' ) );
	}

	public function process_login() {
		if ( ! empty( $_POST['edu-login-ver'] ) && wp_verify_nonce( $_POST['edu-login-ver'], 'edu-profile-login' ) ) {
			$surl     = get_home_url();
			$cat      = get_option( 'eduadmin-rewriteBaseUrl', '' );
			$base_url = $surl . '/' . $cat;

			$regular_login = ! empty( $_POST['eduformloginaction'] ) && 'login' === sanitize_text_field( wp_unslash( $_POST['eduformloginaction'] ) ); // Input var okay.

			if ( ! empty( $_POST['eduadminloginEmail'] ) && ! empty( $_POST['eduadminpassword'] ) ) { // Input var okay.
				$login_field = get_option( 'eduadmin-loginField', 'Email' );

				$possible_persons = EDUAPI()->OData->Persons->Search(
					'PersonId',
					"CanLogin and $login_field eq '" . sanitize_text_field( wp_unslash( $_POST['eduadminloginEmail'] ) ) . '\'', // Input var okay.
					'CustomFields($filter=ShowOnWeb;)',
					null,
					null,
					null,
					null,
					false
				)['value'];

				if ( 1 === count( $possible_persons ) ) {
					$login_result = EDUAPI()->REST->Person->LoginById(
						$possible_persons[0]['PersonId'],
						sanitize_text_field( $_POST['eduadminpassword'] ) // Input var okay.
					);

					if ( 200 === $login_result['@curl']['http_code'] ) {
						$user = $this->get_login_user( $login_result['PersonId'], $login_result['CustomerId'] );
					}
				}

				if ( ! empty( $user ) ) {
					if ( $regular_login ) {
						if ( ! empty( $_POST['eduReturnUrl'] ) ) {
							wp_safe_redirect( esc_url_raw( $_POST['eduReturnUrl'] ) ); // Input var okay.
						} else {
							wp_safe_redirect( esc_url_raw( $base_url . '/profile/myprofile/' . edu_get_query_string() ) );
						}
						exit();
					}
				} else {
					EDU()->session['eduadminLoginError'] = _x( 'Wrong username or password.', 'frontend', 'eduadmin-booking' );
				}
			}
		}
	}

	public function get_login_user( $personId, $customerId ) {
		$contact = EDUAPI()->OData->Persons->GetItem(
			$personId,
			null,
			'CustomFields($filter=ShowOnWeb;)',
			false
		);

		unset( $contact['@odata.context'] );
		unset( $contact['@curl'] );

		$customer = EDUAPI()->OData->Customers->GetItem(
			$customerId,
			null,
			'BillingInfo,CustomFields($filter=ShowOnWeb;)',
			false
		);

		unset( $customer['@odata.context'] );
		unset( $customer['@curl'] );

		$user           = new stdClass();
		$c1             = wp_json_encode( $contact );
		$user->Contact  = json_decode( $c1 );
		$c2             = wp_json_encode( $customer );
		$user->Customer = json_decode( $c2 );

		EDU()->session['eduadmin-loginUser'] = $user;

		return $user;
	}
}
