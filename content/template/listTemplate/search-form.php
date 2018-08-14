<?php if ( $search_visible ) { ?>
	<form method="POST" class="search-form">
		<div class="search-row">
			<div class="search-dropdowns">
				<?php if ( $allow_location_search && ! empty( $addresses ) && $show_events ) { ?>
					<div class="search-item search-dropdown">
						<select name="eduadmin-city">
							<option value=""><?php esc_html_e( 'Choose city', 'eduadmin-booking' ); ?></option>
							<?php
							$added_cities = array();
							foreach ( $addresses as $address ) {
								$city = trim( $address['City'] );
								if ( ! in_array( $address['LocationId'], $added_cities, true ) && ! empty( $city ) ) {
									echo '<option value="' . intval( $address['LocationId'] ) . '"' . ( ! empty( $_POST['eduadmin-city'] ) && intval( $_POST['eduadmin-city'] ) === $address['LocationId'] ? ' selected="selected"' : '' ) . '>' . esc_html( $address['City'] ) . '</option>';  // Input var okay.
									$added_cities[] = $address['LocationId'];
								}
							}
							?>
						</select>
					</div>
				<?php } ?>
				<?php if ( $allow_subject_search && ! empty( $distinct_subjects ) ) { ?>
					<div class="search-item search-dropdown">
						<select name="eduadmin-subject">
							<option value=""><?php esc_html_e( 'Choose subject', 'eduadmin-booking' ); ?></option>
							<?php
							foreach ( $distinct_subjects as $subj => $val ) {
								echo '<option value="' . intval( $subj ) . '"' . ( ! empty( $_POST['eduadmin-subject'] ) && intval( $_POST['eduadmin-subject'] ) === $subj ? ' selected="selected"' : '' ) . '>' . esc_html( $val ) . '</option>'; // Input var okay.
							}
							?>
						</select>
					</div>
				<?php } ?>
				<?php if ( $allow_category_search && ! empty( $categories ) ) { ?>
					<div class="search-item search-dropdown">
						<select name="eduadmin-category">
							<option value=""><?php esc_html_e( 'Choose category', 'eduadmin-booking' ); ?></option>
							<?php
							foreach ( $categories as $subj ) {
								echo '<option value="' . intval( $subj['CategoryId'] ) . '"' . ( ! empty( $_POST['eduadmin-category'] ) && intval( $_POST['eduadmin-category'] ) === $subj['CategoryId'] ? ' selected="selected"' : '' ) . '>' . esc_html( $subj['CategoryName'] ) . '</option>'; // Input var okay.
							}
							?>
						</select>
					</div>
				<?php } ?>
				<?php if ( $allow_level_search && ! empty( $levels ) ) { ?>
					<div class="search-item search-dropdown">
						<select name="eduadmin-level">
							<option value=""><?php esc_html_e( 'Choose course level', 'eduadmin-booking' ); ?></option>
							<?php
							foreach ( $levels as $level ) {
								echo '<option value="' . intval( $level['CourseLevelId'] ) . '"' . ( ! empty( $_POST['eduadmin-level'] ) && intval( $_POST['eduadmin-level'] ) === $level['CourseLevelId'] ? ' selected="selected"' : '' ) . '>' . esc_html( $level['Name'] ) . '</option>'; // Input var okay.
							}
							?>
						</select>
					</div>
				<?php } ?>
			</div>
			<?php if($allow_region_search) : ?>
			<div class="search-regionitems">
				<?php
				include('search/region.php');
				?>
			</div>
			<?php endif; ?>
			<div class="search-box">
				<div class="search-item search-text">
					<input class="edu-searchTextBox" type="search" name="searchCourses" results="10" placeholder="<?php esc_attr_e( 'Search courses', 'eduadmin-booking' ); ?>"<?php if ( isset( $_POST['searchCourses'] ) ) { // Input var okay.
						echo ' value="' . esc_attr( sanitize_text_field( wp_unslash( $_POST['searchCourses'] ) ) ) . '"'; // Input var okay.
					} ?> />
				</div>
				<div class="search-item search-button">
					<input type="submit" class="searchButton" value="<?php esc_attr_e( 'Search', 'eduadmin-booking' ); ?>"/>
				</div>
			</div>
		</div>
		<?php
		if ( ! empty( $_POST['searchCourses'] ) ) { // Input var okay.
			?>
			<script type="text/javascript">
				(function () {
					var searchBox = jQuery('.edu-searchTextBox');
					searchBox[0].scrollIntoView(true);
					searchBox.focus();
				})();
			</script>
			<?php
		}
		?>
	</form>
	<?php
}
