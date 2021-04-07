<?php
// phpcs:disable WordPress.NamingConventions,Squiz
$use_limited_discount = EDU()->is_checked( 'eduadmin-useLimitedDiscount', false );
if ( $use_limited_discount ) {
	if ( ! empty( $customer->CustomerId ) && ! empty( $contact->PersonId ) && $eventid > 0 ) {
		$c_cards = EDUAPI()->REST->Customer->GetValidVouchers( $customer->CustomerId, $eventid, $contact->PersonId );
		if ( empty( $c_cards['Message'] ) ) {
			unset( $c_cards['@curl'] );
			unset( $c_cards['@headers'] );
			?>
			<div class="discountCardView">
				<?php
				if ( 0 !== count( $c_cards ) ) {
					?>
					<h2><?php echo esc_html_x( 'Discount cards', 'frontend', 'eduadmin-booking' ); ?></h2>

					<?php
					foreach ( $c_cards as $card ) {
						if ( $card['ValidForNumberOfParticipants'] > 0 ) {
							$enough_credits = true;
							?>
							<label class="discountCardItem">
								<input type="radio" name="edu-limitedDiscountID"
									<?php if ( ! $enough_credits ) : ?>
										disabled readonly title="<?php echo esc_attr_x( 'Not enough uses left on this card.', 'frontend', 'eduadmin-booking' ); ?>"
									<?php endif; ?>
									   value="<?php echo esc_attr( $card['VoucherId'] ); ?>" />
								<?php echo esc_html( $card['Description'] ); ?>&nbsp;
								<i>(<?php echo esc_html( sprintf( _n( 'Valid for %s participant', 'Valid for %s participants', $card['ValidForNumberOfParticipants'], 'eduadmin-booking' ), $card['ValidForNumberOfParticipants'] ) ); ?>)</i>
							</label>
							<?php
						}
					}
				}
				?>
				<br />
			</div>
			<?php
		}
	}
}
