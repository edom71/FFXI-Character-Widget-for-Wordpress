<?php
/*
Plugin Name: FFXI Character Stats for Wordpress
Description: Add a display menu for your stats.
Version: 5.0
Author: Demonicpagan
Author URI: http://trials.stelth2000inc.com


Copyright 2007-2101  Demonicpagan  (email : demonicpagan@gmail.com)

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

/* Global & Misc. Variables */
global $wpdb, $table_name, $ffxi_db_version, $ffxi_version, $ffxi_perms, $FFXI_PATH;
$table_name = $wpdb->prefix."ffxistats";
$ffxi_db_version = "5.0";
$ffxi_version = "5.0";
$ffxi_perms = 10;
$FFXI_PATH = WP_PLUGIN_URL."/ffxi";

/* Hooks */
register_activation_hook(__FILE__, 'ffxi_install');
add_action('wp_head', 'ffxi_head');
add_action('admin_menu', 'ffxi_admin_block');
add_action('admin_head', 'ffxi_admin_head');

/* Administration */
function ffxi_admin_head() {
	global $FFXI_PATH;
	// load CSS and SCRIPT pages to the admin head
	echo '
		<!-- Start of FFXI Stats Plugin CSS & JS Includes (Admin) -->
		<link href="'.$FFXI_PATH.'/ffxi.css" rel="stylesheet" type="text/css" media="screen, projection" />
		<script src="'.$FFXI_PATH.'/scripts/preview.js" type="text/javascript"></script>
		<!-- End of FFXI Stats Plugin CSS & JS Includes (Admin) -->
	';
}

function ffxi_head() {
	global $FFXI_PATH;
	// load CSS and SCRIPT pages to the admin head
	echo '
		<!-- Start of FFXI Stats Plugin CSS Include -->
		<link href="'.$FFXI_PATH.'/ffxi.css" rel="stylesheet" type="text/css" media="screen, projection" />
		<!-- End of FFXI Stats Plugin CSS Include -->
	';
}

function ffxi_admin_block() {
	// Include admin menus
	require_once(dirname(__FILE__).'/admin/ffxi-admin.php');
}

/* Functions */
function ffxi_install() {
	global $wpdb, $table_name, $ffxi_db_version, $ffxi_version;
	require_once(dirname(__FILE__).'/install.php');
}