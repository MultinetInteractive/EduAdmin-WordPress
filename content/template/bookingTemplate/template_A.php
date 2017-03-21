<?php
ob_start();
global $wp_query;
global $eduapi;
global $edutoken;
$apiKey = get_option('eduadmin-api-key');

if(!$apiKey || empty($apiKey))
{
    edu_notice_config_incomplete();
}
else
{
	$edo = get_transient('eduadmin-listCourses');
	if(!$edo)
	{
		$filtering = new XFiltering();
		$f = new XFilter('ShowOnWeb','=','true');
		$filtering->AddItem($f);

		$edo = $eduapi->GetEducationObject($edutoken, '', $filtering->ToString());
		set_transient('eduadmin-listCourses', $edo, 6 * HOUR_IN_SECONDS);
	}

	$selectedCourse = false;
	$name = "";
	foreach($edo as $object)
	{
		$name = (!empty($object->PublicName) ? $object->PublicName : $object->ObjectName);
		$id = $object->ObjectID;
		if(makeSlugs($name) == $wp_query->query_vars['courseSlug'] && $id == $wp_query->query_vars["courseId"])
		{
			$selectedCourse = $object;
			break;
		}
	}
	if(!$selectedCourse)
	{
		?>
		<script>history.go(-1);</script>
		<?php
		die();
	}
	$ft = new XFiltering();
	if(isset($_REQUEST['eid']))
	{
		$eventid = $_REQUEST['eid'];
		$f = new XFilter('EventID', '=', $eventid);
		$ft->AddItem($f);
	}
	$f = new XFilter('ShowOnWeb', '=', 'true');
	$ft->AddItem($f);
	$f = new XFilter('ObjectID', '=', $selectedCourse->ObjectID);
	$ft->AddItem($f);
	$f = new XFilter('LastApplicationDate', '>=', date("Y-m-d 00:00:00"));
	$ft->AddItem($f);
	$f = new XFilter('StatusID','=','1');
	$ft->AddItem($f);

	$f = new XFilter('CustomerID','=','0');
	$ft->AddItem($f);

	$st = new XSorting();
	$s = new XSort('PeriodStart', 'ASC');
	$st->AddItem($s);

	$events = $eduapi->GetEvent(
		$edutoken,
		$st->ToString(),
		$ft->ToString()
	);

	$event = $events[0];

	if(!$event)
	{
		?>
		<script>history.go(-1);</script>
		<?php
		die();
	}

	if(isset($_REQUEST['act']) && $_REQUEST['act'] == 'bookCourse')
	{
		include_once("createBooking.php");
	}

	$contact = new CustomerContact();
	$customer = new Customer();

	$discountPercent = 0.0;
	$participantDiscountPercent = 0.0;
	$customerInvoiceEmail = "";
	$incVat = $eduapi->GetAccountSetting($edutoken, 'PriceIncVat') == "yes";

	if(isset($_SESSION['eduadmin-loginUser']))
	{
		$user = $_SESSION['eduadmin-loginUser'];
		$contact = $user->Contact;
		$customer = $user->Customer;
		if(isset($customer->CustomerID))
		{
			$f = new XFiltering();
			$ft = new XFilter('CustomerID', '=', $customer->CustomerID);
			$f->AddItem($ft);
			$extraInfo = $eduapi->GetCustomerExtraInfo($edutoken, '', $f->ToString());
			foreach($extraInfo as $info)
			{
				if($info->Key == "DiscountPercent" && isset($info->Value))
				{
					$discountPercent = (double)$info->Value;
				}
				else if($info->Key == "ParticipantDiscountPercent" && isset($info->Value))
				{
					$participantDiscountPercent = (double)$info->Value;
				}
				else if($info->Key == "CustomerInvoiceEmail" && isset($info->Value))
				{
					$customerInvoiceEmail = $info->Value;
				}
			}
		}
	}

	$occIds = Array();
	$occIds[] = -1;
	if(isset($_REQUEST['eid']))
	{
		foreach($events as $ev)
		{
			$occIds[] = $ev->OccationID;
		}
	}
	else
	{
		$occIds[] = $event->OccationID;
	}

	$ft = new XFiltering();
	$f = new XFilter('PublicPriceName', '=', 'true');
	$ft->AddItem($f);
	$f = new XFilter('OccationID', 'IN', join(',', $occIds));
	$ft->AddItem($f);

	$st = new XSorting();
	$s = new XSort('Price', 'ASC');
	$st->AddItem($s);

	$prices = $eduapi->GetPriceName($edutoken, $st->ToString(), $ft->ToString());

	$uniquePrices = Array();
	foreach($prices as $price)
	{
		$uniquePrices[$price->Description] = $price;
	}
	// PriceNameVat
	$firstPrice = current($uniquePrices);

	$st = new XSorting();
	$s = new XSort('StartDate', 'ASC');
	$st->AddItem($s);
	$s = new XSort('EndDate', 'ASC');
	$st->AddItem($s);

	$ft = new XFiltering();
	$f = new XFilter('ParentEventID', '=', $event->EventID);
	$ft->AddItem($f);
	$subEvents = $eduapi->GetSubEvent($edutoken, $st->ToString(), $ft->ToString());
	$occIds = Array();
	foreach($subEvents as $se) {
		$occIds[] = $se->OccasionID;
	}

	$ft = new XFiltering();
	$f = new XFilter('PublicPriceName', '=', 'true');
	$ft->AddItem($f);
	$f = new XFilter('OccationID', 'IN', join(',', $occIds));
	$ft->AddItem($f);

	$st = new XSorting();
	$s = new XSort('Price', 'ASC');
	$st->AddItem($s);

	$subPrices = $eduapi->GetPriceName($edutoken, $st->ToString(), $ft->ToString());
	$sePrice = array();
	foreach($subPrices as $sp)
	{
		$sePrice[$sp->OccationID][] = $sp;
	}

	$hideSubEventDateInfo = get_option('eduadmin-hideSubEventDateTime', false);
?>

	<div class="eduadmin">
		<form action="" method="post">
			<input type="hidden" name="act" value="bookCourse" />

			<a href="../" class="backLink"><?php edu_e("« Go back"); ?></a>

			<div class="title">

				<img class="courseImage" src="<?php echo $selectedCourse->ImageUrl; ?>" />

				<h1 class="courseTitle">
					<?php echo $name; ?>
				</h1>

				<?php if (count($events) > 1): ?>
					<div class="dateSelectLabel">
						<?php edu_e("Select the event you want to book"); ?>
					</div>

					<select name="eid" required class="dateInfo" onchange="eduBookingView.SelectEvent(this);">
						<option value=""><?php edu_e("Select event"); ?></option>
						<?php foreach($events as $ev): ?>
							<option value="<?php echo $ev->EventID; ?>">
							<?php
								echo wp_strip_all_tags(GetOldStartEndDisplayDate($ev->PeriodStart, $ev->PeriodEnd)) . ", ";
								echo date("H:i", strtotime($ev->PeriodStart)); ?> - <?php echo date("H:i", strtotime($ev->PeriodEnd));
								$addresses = get_transient('eduadmin-location-' . $ev->LocationAddressID);

								if(!$addresses)
								{
									$ft = new XFiltering();
									$f = new XFilter('LocationAddressID', '=', $ev->LocationAddressID);
									$ft->AddItem($f);
									$addresses = $eduapi->GetLocationAddress($edutoken, '', $ft->ToString());
									set_transient('eduadmin-location-' . $ev->LocationAddressID, $addresses, DAY_IN_SECONDS);
								}

								foreach($addresses as $address)
								{
									if($address->LocationAddressID === $ev->LocationAddressID)
									{
										echo ", " . $ev->AddressName . ", " . $address->Address . ", " . $address->City;
										break;
									}
								}
							?>
							</option>
						<?php endforeach; ?>
					</select>
				<?php else: ?>
					<?php
						echo "<div class=\"dateInfo\">" . GetOldStartEndDisplayDate($event->PeriodStart, $event->PeriodEnd) . ", ";
						echo date("H:i", strtotime($event->PeriodStart)); ?> - <?php echo date("H:i", strtotime($event->PeriodEnd));
						$addresses = get_transient('eduadmin-location-' . $event->LocationAddressID);
						if(!$addresses)
						{
							$ft = new XFiltering();
							$f = new XFilter('LocationAddressID', '=', $event->LocationAddressID);
							$ft->AddItem($f);
							$addresses = $eduapi->GetLocationAddress($edutoken, '', $ft->ToString());
							set_transient('eduadmin-location-' . $event->LocationAddressID, $addresses, HOUR_IN_SECONDS);
						}

						foreach($addresses as $address)
						{
							if($address->LocationAddressID === $event->LocationAddressID)
							{
								echo ", " . $event->AddressName . ", " . $address->Address . ", " . $address->City;
								break;
							}
						}
						echo "</div>";
						?>
				<?php endif; ?>
			</div>
			<?php
				if(isset($_SESSION['eduadmin-loginUser']) && isset($contact->CustomerContactID) && $contact->CustomerContactID > 0) {

					$surl = get_home_url();
					$cat = get_option('eduadmin-rewriteBaseUrl');
					$baseUrl = $surl . '/' . $cat;
			?>
			<div class="notUserCheck">
			<i><?php echo sprintf(edu__("Not %s? %sLog out%s"), "<b>" . $contact->ContactName . "</b>", "<a href=\"" . $baseUrl . "/profile/logout\">", "</a>"); ?></i>
			</div>
			<?php
				}
			?>
			<?php
			$singlePersonBooking = get_option('eduadmin-singlePersonBooking', false);
			if ($singlePersonBooking) {
				include_once("singlePersonBooking.php");
			} else {
				$fieldOrder = get_option('eduadmin-fieldOrder', 'contact_customer');
				if($fieldOrder == "contact_customer") {
					include_once("contactView.php");
					include_once("customerView.php");
				} else if($fieldOrder == "customer_contact") {
					include_once("customerView.php");
					include_once("contactView.php");
				}
				include_once("participantView.php");
			}
			?>
			<?php if (get_option('eduadmin-selectPricename', 'firstPublic') == "selectWholeEvent"): ?>
			<div class="priceView">
				<?php
					edu_e("Price name");
				?>
				<select id="edu-pricename" name="edu-pricename" required class="edudropdown edu-pricename" onchange="eduBookingView.UpdatePrice();">
				<option value=""><?php edu_e("Choose price"); ?></option>
					<?php foreach($prices as $price): ?>
						<option
							data-price="<?php echo esc_attr($price->Price); ?>"
							date-discountpercent="<?php echo esc_attr($price->DiscountPercent); ?>"
							data-pricelnkid="<?php echo esc_attr($price->OccationPriceNameLnkID); ?>"
							data-maxparticipants="<?php echo @esc_attr($price->MaxPriceNameParticipantNr); ?>"
							data-currentparticipants="<?php echo @esc_attr($price->ParticipantNr); ?>"
							<?php if($price->MaxPriceNameParticipantNr > 0 && $price->ParticipantNr >= $price->MaxPriceNameParticipantNr) { ?>
							disabled
							<?php } ?>
							value="<?php echo esc_attr($price->OccationPriceNameLnkID); ?>">
							<?php echo trim($price->Description); ?> (<?php echo convertToMoney($price->Price, get_option('eduadmin-currency', 'SEK')) . " " . edu__($incVat ? "inc vat" : "ex vat"); ?>)
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<?php endif; ?>

			<?php include_once("questionView.php"); ?>

			<?php if (get_option('eduadmin-allowDiscountCode', false)): ?>
			<div class="discountView">
				<label>
					<div class="inputLabel">
						<?php edu_e("Discount code"); ?>
					</div>
					<div class="inputHolder">
						<input type="text" name="edu-discountCode" id="edu-discountCode" style="width: 78%;" placeholder="<?php edu_e("Discount code"); ?>" />
						<button class="validateDiscount"
							style="width: 20%;"
							data-categoryid="<?php echo @esc_attr($selectedCourse->CategoryID); ?>"
							data-objectid="<?php echo @esc_attr($selectedCourse->ObjectID); ?>"
							onclick="eduBookingView.ValidateDiscountCode(); return false;">
							<?php edu_e("Validate"); ?>
						</button>
						<input type="hidden" name="edu-discountCodeID" id="edu-discountCodeID" />
					</div>
				</label>
				<div class="edu-modal warning" id="edu-warning-discount">
					<?php edu_e("Invalid discount code, please check your code and try again."); ?>
				</div>
			</div>
			<?php endif; ?>
			<?php
			$useLimitedDiscount = get_option('eduadmin-useLimitedDiscount', false);
			if($useLimitedDiscount) {
				include_once("limitedDiscountView.php");
			}
			?>
			<div class="submitView">
				<div class="sumTotal">
					<?php edu_e('Total sum:'); ?> <span id="sumValue" class="sumValue"></span>
				</div>

				<?php if(get_option('eduadmin-useBookingTermsCheckbox', false) && $link = get_option('eduadmin-bookingTermsLink', '')): ?>
					<div class="confirmTermsHolder">
						<label>
							<input type="checkbox" id="confirmTerms" name="confirmTerms" value="agree" />
							<?php echo sprintf(edu__('I agree to the %sTerms and Conditions%s'), '<a href="' . $link . '" target="_blank">', '</a>'); ?>
						</label>
					</div>
				<?php endif; ?>

				<input type="submit" class="bookButton" onclick="var validated = eduBookingView.CheckValidation(); return validated;" value="<?php edu_e("Book now"); ?>" />

				<div class="edu-modal warning" id="edu-warning-terms">
					<?php edu_e("You must accept Terms and Conditions to continue."); ?>
				</div>
				<div class="edu-modal warning" id="edu-warning-no-participants">
					<?php edu_e("You must add some participants."); ?>
				</div>
				<div class="edu-modal warning" id="edu-warning-missing-participants">
					<?php edu_e("One or more participants is missing a name."); ?>
				</div>
				<div class="edu-modal warning" id="edu-warning-missing-civicregno">
					<?php edu_e("One or more participants is missing their civic registration number."); ?>
				</div>
			</div>
		</form>
	</div>

	<?php
		$originalTitle = get_the_title();
		$newTitle = $name . " | " . $originalTitle;

		$discountValue = 0.0;
		if ($participantDiscountPercent != 0)
		{
			$discountValue = ($participantDiscountPercent / 100) * $firstPrice->Price;
		}
	?>
	<script type="text/javascript">
		var pricePerParticipant = <?php echo round($firstPrice->Price - $discountValue, 2); ?>;
		var discountPerParticipant = <?php echo round($participantDiscountPercent / 100, 2); ?>;
		var totalPriceDiscountPercent = <?php echo $discountPercent; ?>;
		var currency = '<?php echo esc_attr(get_option('eduadmin-currency', 'SEK')); ?>';
		var vatText = '<?php echo edu__($incVat ? "inc vat" : "ex vat"); ?>';
		var ShouldValidateCivRegNo = <?php echo (get_option('eduadmin-validateCivicRegNo', false) ? "true" : "false"); ?>;
		(function() {
			var title = document.title;
			title = title.replace('<?php echo esc_attr($originalTitle); ?>', '<?php echo esc_attr($newTitle); ?>');
			document.title = title;
			eduBookingView.MaxParticipants = <?php echo ($event->MaxParticipantNr == 0 ? -1 : ($event->MaxParticipantNr - $event->TotalParticipantNr)); ?>;
			<?php echo (get_option('eduadmin-singlePersonBooking', false) ? "eduBookingView.SingleParticipant = true;" : ""); ?>
			eduBookingView.AddParticipant();
			eduBookingView.UpdatePrice();
		})();
	</script>
<?php
}
$out = ob_get_clean();
return $out;
