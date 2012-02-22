<?php 
/*
Plugin Name: Social Analytics
Plugin URI: http://www.springest.co.uk/social-analytics/
Description: Plugin for Monitoring Which Social Networks Your Visitors are Logged Into With Google Analytics.
Author: Martijn Scheybeler
Version: 0.2
Author URI: http://www.linkedin.com/in/martijnscheijbeler
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

# Load text domain
load_plugin_textdomain('social_analytics', false, dirname(plugin_basename(__FILE__)) . '/languages' );

function social_analytics_head() {
	echo "<script type='text/javascript'>
			function record_login_status(slot, network, status) {
				if (status) {
					_gaq.push(['_setCustomVar', slot, network + '_State', 'LoggedIn', 1]); 
				}
				else {
					_gaq.push(['_setCustomVar', slot, network + '_State', 'NotLoggedIn', 1]);
				}
			}
	</script>";
}

function social_analytics_footer() {
	$appID = get_option('app_id');
	echo '<img style="display:none;" onload="record_login_status(1, \'Google\', true)" onerror="record_login_status(1, \'Google\', false)" src="https://accounts.google.com/CheckCookie?continue=https://www.google.com/intl/en/images/logos/accounts_logo.png" />
	<img style="display:none;" onload="record_login_status(2, \'GooglePlus\', true)" onerror="record_login_status(2, \'GooglePlus\', false)" src="https://plus.google.com/up/?continue=https://www.google.com/intl/en/images/logos/accounts_logo.png&type=st&gpsrc=ogpy0" />
	<img style="display:none;" src="https://twitter.com/login?redirect_after_login=%2Fimages%2Fspinner.gif" onload="record_login_status(3, \'Twitter\', true)" onerror="record_login_status(3, \'Twitter\', false)" />
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({ appId:"'. esc_attr($appID) .'", status:true,  cookie:true, xfbml:true});
			FB.getLoginStatus(function(response){
				if (response.status != "unknown") {
					record_login_status(4, "Facebook", true);
				}
				else {
					record_login_status(4, "Facebook", false);
				}
			});
		};
		(function(d){
			var js, id = "facebook-jssdk"; if (d.getElementById(id)) {return;}
			js = d.createElement("script"); js.id = id; js.async = true;
			js.src = "//connect.facebook.net/en_US/all.js";
			d.getElementsByTagName("head")[0].appendChild(js);
		}(document));
	</script>';
}

//*************** Admin function ***************
function socialanalytics_admin() {
	include('socialanalytics_admin.php');
}

function oscimp_admin_actions() {
    add_options_page('Social Analytics', 'Social Analytics', 1, 'Social-Analytics', 'socialanalytics_admin');
}

add_action('admin_menu', 'oscimp_admin_actions');
add_action('wp_footer', 'social_analytics_footer');
add_action('wp_head', 'social_analytics_head', 98);
?>