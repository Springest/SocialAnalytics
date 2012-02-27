<?php 
	if($_POST['social_analytics_config'] == 'Y') {
		//Form data sent
		$facebook_app_id = $_POST['facebook_app_id'];
		update_option('app_id', $facebook_app_id);
		$tracking_method = $_POST['tracking_method'];
		update_option('tracking_method', $tracking_method);
		$social_network_fb = $_POST['social_network_fb'];
		update_option('social_network_fb', $social_network_fb);
		$social_network_tw = $_POST['social_network_tw'];
		update_option('social_network_tw', $social_network_tw);
		$social_network_google = $_POST['social_network_google'];
		update_option('social_network_google', $social_network_google);
		$social_network_google_plus = $_POST['social_network_google_plus'];
		update_option('social_network_google_plus', $social_network_google_plus);
		$social_network_digg = $_POST['social_network_digg'];
		update_option('social_network_digg', $social_network_digg);
?>
<div class="updated"><p><strong><?php _e('Changes saved.', 'social_analytics'); ?></strong></p></div>
<?php
	}
	else {
		$facebook_app_id = get_option('app_id');
		$tracking_method = get_option('tracking_method');
		$social_network_fb = get_option('social_network_fb');
		$social_network_tw = get_option('social_network_tw');
		$social_network_google = get_option('social_network_google');
		$social_network_google_plus = get_option('social_network_google_plus');
		$social_network_digg = get_option('social_network_digg');
	}
?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
		<?php echo "<h2>" . __( 'Social Analytics', 'social_analytics') . "</h2>"; ?>
		<?php echo "<h3>" . __( 'Facebook', 'social_analytics') . "</h2>"; ?>
		<p><?php _e("Grab the App ID from the Facebook App you just created.", 'social_analytics'); ?></p>
		<form name="social_analytics_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
			<input type="hidden" name="social_analytics_config" value="Y">
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row">
							<label for="facebook_app_id"><?php _e("Facebook App ID:", 'social_analytics'); ?></label>
						</th>
						<td>
							<input type="text" id="facebook_app_id" name="facebook_app_id" value="<?php echo $facebook_app_id; ?>" size="20"> <em><?php _e("Example: 722620961", 'social_analytics'); ?></em>
						</td>
					</tr>
				</tbody>
			</table>
			<?php echo "<h3>" . __( 'Google Analytics', 'social_analytics') . "</h2>"; ?>
			<p><?php _e("Choose the tracking method for the Social Analytics Plugin.", 'social_analytics'); ?></p>
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row">
							<label for="tracking_method"><?php _e("Tracking Method:", 'social_analytics'); ?></label>
						</th>
						<td>
							<input type="radio" name="tracking_method" value="cv" id="cv" <?php if ($tracking_method == "" || $tracking_method == "cv") echo "checked"; ?>> <label for="cv"><?php _e("Custom Variables", 'social_analytics'); ?></label><br /><input type="radio" name="tracking_method" value="ev" id="ev" <?php if ($tracking_method == "ev") echo "checked"; ?>> <label for="ev"><?php _e("Event Tracking", 'social_analytics'); ?></label>
						</td>
					</tr>
				</tbody>
			</table>
			<?php echo "<h3>" . __( 'Social Networks', 'social_analytics') . "</h2>"; ?>
			<p><?php _e("Which Social Networks do you want to track in Google Analytics?", 'social_analytics'); ?></p>
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row">
							<label for="tracking_method"><?php _e("Social Networks:", 'social_analytics'); ?></label>
						</th>
						<td>
							<input type="checkbox" name="social_network_fb" value="fb" id="fb" <?php if ($social_network_fb != "fb") {echo "unchecked";} else {echo "checked";}  ?>> <label for="fb"><?php _e("Facebook", 'social_analytics'); ?></label><br />
							<input type="checkbox" name="social_network_tw" value="tw" id="tw" <?php if ($social_network_tw != "tw") {echo "unchecked";} else {echo "checked";}  ?>> <label for="tw"><?php _e("Twitter", 'social_analytics'); ?></label><br />
							<input type="checkbox" name="social_network_google" value="google" id="google" <?php if ($social_network_google != "google") {echo "unchecked";} else {echo "checked";} ?>> <label for="google"><?php _e("Google", 'social_analytics'); ?></label><br />
							<input type="checkbox" name="social_network_google_plus" value="google_plus" id="google_plus" <?php if ($social_network_google_plus != "google_plus") {echo "unchecked";} else {echo "checked";} ?>> <label for="google_plus"><?php _e("Google Plus", 'social_analytics'); ?></label><br />
							<input type="checkbox" name="social_network_digg" value="digg" id="digg" <?php if ($social_network_digg != "digg") {echo "unchecked";} else {echo "checked";} ?>> <label for="digg"><?php _e("Digg", 'social_analytics'); ?></label>
						</td>
					</tr>
				</tbody>
			</table>
			<p class="submit">
				<input type="submit" name="Submit" id="submit" class="button-primary" value="<?php _e('Save Changes', 'social_analytics') ?>" />
			</p>
		</form>
	</div>
</div>