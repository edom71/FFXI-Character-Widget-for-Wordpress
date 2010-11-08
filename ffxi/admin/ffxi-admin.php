<?php
/*  Copyright 2010 Demonicpagan @ Stelth2000 Inc (email: demonicpagan@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Security */
if (!defined('ABSPATH')) die("This page can only be accessed via the WP-Admin");

/* Add a new top-level menu */
add_menu_page('FFXI Profile', 'FFXI Stats', 'Change FFXI Stats', __FILE__, 'show_ffxi_profile');

/* Add a submenu to the custom top-level menu */
add_submenu_page(__FILE__, 'Sidebar Preview', 'Preview', 'Change FFXI Stats', __FILE__, 'show_ffxi_profile');

/* Add a second submenu to the custom top-level menu */
add_submenu_page(__FILE__, 'Plugin Settings', 'Settings', 'Change FFXI Stats', 'ffxi-settings', 'show_ffxi_settings');

/* show_ffxi_profile() displays the page content for the first submenu */
function show_ffxi_profile() {
	global $wpdb;

	$ffxi_options = get_options('ffxi_options');
	if(isset($_POST['updateopt'])) {
		check_admin_referer('ffxi_show');
		if($_POST['page_options']) {
			$options = explode(',', stripslashes($_POST['page_options']));
		}
		if($options) {
			foreach ($options as $option) {
				$option = trim($option);
				$value = trim($_POST[$option]);
				$ffxi_options[$option] = $value;
			}
		}

		update_option('ffxi_options', $ffxi_options);
		$messagetext = '<font color="green">Update Successful</font>';
	}

	if(!empty($messagetext)) {
		echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$messagetext.'</p></div>';
	}

	# Retrieve some stored infromation from the settings database
	$profilelist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats WHERE id=0"); // Profile Info
	foreach($profilelist as $profile) {
		$chname = $profile->chname;
		$world = $profile->server;
		$ls = $profile->linkshell;
	}

	// 
}