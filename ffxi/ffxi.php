<?php
/*
Plugin Name: FFXI Character Stats for Wordpress
Description: Add a display menu for your stats.
Version: 3.0
Author: Demonicpagan
Author URI: http://trials.stelth2000inc.com
*/

/*  Copyright 2007  Demonicpagan  (email : demonicpagan@gmail.com)

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
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

global $wpdb, $wp_version;

//ini_set('display_errors', '1');
// ini_set('error_reporting', E_ALL);

# Version
$ffxi_db_version = "3.0";

# Define URL
$myabspath = str_replace("\\","/",ABSPATH);  // required for Windows & XAMPP
define('FWINABSPATH', $myabspath);
define('FFXIFOLDER', dirname(plugin_basename(__FILE__)));
define('FFXI_ABSPATH', $myabspath.'wp-content/plugins/' . FFXIFOLDER .'/');
define('FFXI_URLPATH', get_option('siteurl').'/wp-content/plugins/' . FFXIFOLDER.'/');

# Get options
$ffxi_options = get_option('ffxi_options');
$ffxi_db_version = get_option('ffxi_db_version');

# Database pointers
$wpdb->ffxistats = $wpdb->prefix.'ffxistats';
$wpdb->ffxistats_jobs = $wpdb->prefix.'ffxistats_jobs';
$wpdb->ffxistats_ajobs = $wpdb->prefix.'ffxistats_ajobs';
$wpdb->ffxistats_craft = $wpdb->prefix.'ffxistats_craft';
$wpdb->ffxistats_weapon = $wpdb->prefix.'ffxistats_weapon';
$wpdb->ffxistats_combat = $wpdb->prefix.'ffxistats_combat';
$wpdb->ffxistats_magic = $wpdb->prefix.'ffxistats_magic';
$wpdb->ffxistats_mission = $wpdb->prefix.'ffxistats_mission';

# Load admin panel
include_once (dirname (__FILE__)."/ffxi_install.php");
include_once (dirname (__FILE__)."/admin/ffxi_admin.php");

add_action('activate_' . FFXIFOLDER .'/ffxi.php', 'ffxi_install');
// init tables in wp-database if plugin is activated
function ffxi_install() {
	ffxiplug_install();
}

?>