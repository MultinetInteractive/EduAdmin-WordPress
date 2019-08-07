<?php
// phpcs:disable WordPress.NamingConventions,Squiz
if ( ! empty( $_POST['edu-login-ver'] ) && wp_verify_nonce( $_POST['edu-login-ver'], 'edu-profile-login' ) && ! empty( $_POST['eduformloginaction'] ) ) {
	if ( 'checkEmail' === $_POST['eduformloginaction'] && ! empty( $_POST['eduadminloginEmail'] ) ) {
		$selected_login_field        = get_option( 'eduadmin-loginField', 'Email' );
		$allow_customer_registration = EDU()->is_checked( 'eduadmin-allowCustomerRegistration', true );

		$login_field = get_option( 'eduadmin-loginField', 'Email' );

		$possible_persons = EDUAPI()->OData->Persons->Search(
			null,
			"$login_field eq '" . sanitize_text_field( wp_unslash( $_POST['eduadminloginEmail'] ) ) . '\'', // Input var okay.
			'CustomFields($filter=ShowOnWeb;)'
		)['value'];

		EDU()->session['needsLogin'] = false;
		EDU()->session['checkEmail'] = true;
		if ( ! empty( $possible_persons ) ) {
			foreach ( $possible_persons as $con ) {
				if ( true === $con['CanLogin'] ) {
					EDU()->session['needsLogin'] = true;
					break;
				}
			}
		}

		if ( count( $possible_persons ) >= 1 ) {
			$contact = $possible_persons[0];
			foreach ( $possible_persons as $con ) {
				$contact = $con;
				if ( true === $con['CanLogin'] ) {
					EDU()->session['needsLogin'] = true;
					break;
				}
			}

			if ( true === $contact['CanLogin'] ) {
				EDU()->session['needsLogin'] = true;

				return;
			} else {
				EDU()->session['needsLogin'] = false;
			}

			$customer = EDUAPI()->OData->Customers->GetItem(
				$contact['CustomerId'],
				null,
				'BillingInfo,CustomFields($filter=ShowOnWeb;)'
			);

			if ( ! empty( $customer ) ) {
				$user                                = new stdClass();
				$c1                                  = wp_json_encode( $contact );
				$user->Contact                       = json_decode( $c1 );
				$c2                                  = wp_json_encode( $customer );
				$user->Customer                      = json_decode( $c2 );
				EDU()->session['eduadmin-loginUser'] = $user;
			} else {
				return;
			}
		}

		if ( $allow_customer_registration && empty( $matching_contacts ) ) {
			$contact              = new EduAdmin_Data_Person();
			$selected_login_field = get_option( 'eduadmin-loginField', 'Email' );
			switch ( $selected_login_field ) {
				case 'Email':
					$contact->Email = sanitize_email( $_POST['eduadminloginEmail'] );
					break;
				case 'CivicRegistrationNumber':
					$contact->CivicRegistrationNumber = sanitize_text_field( $_POST['eduadminloginEmail'] );
					break;
			}

			$customer = new EduAdmin_Data_Customer();

			$user                                = new stdClass();
			$user->NewCustomer                   = true;
			$c1                                  = wp_json_encode( $contact );
			$user->Contact                       = json_decode( $c1 );
			$c2                                  = wp_json_encode( $customer );
			$user->Customer                      = json_decode( $c2 );
			EDU()->session['eduadmin-loginUser'] = $user;
		} else {
			EDU()->session['needsLogin'] = true;
			EDU()->session['checkEmail'] = true;
		}
	}
}
