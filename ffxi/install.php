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

global $user_identity;
get_currentuserinfo();

$role = get_role('administrator');
if(!$role->has_cap('Change FFXI Stats')) {
	$role->add_cap('Change FFXI Stats');
}

$ffxi_options = array();
$ffxi_options['scrape'] = 1;
$ffxi_options['scrape_period'] = 86400; // One day in seconds
$ffxi_options['last_scrape'] = 0; // Last scrape time in seconds
$ffxi_options['max_files'] = 10;
$ffxi_options['cache'] = 1440; // Cache time in minutes
$ffxi_options['timezone'] = "US/Central";
$ffxi_options['showpro'] = true;
$ffxi_options['showbjob'] = true;
$ffxi_options['showajob'] = true;
$ffxi_options['showcraft'] = true;
$ffxi_options['showmis'] = true;

/* Install */
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_name." (
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`chname` VARCHAR(100) NOT NULL DEFAULT '',
		`server` VARCHAR(45) NOT NULL DEFAULT '',
		`linkshell` VARCHAR(100) NOT NULL DEFAULT '',
		`lscomurl` VARCHAR(100) NOT NULL DEFAULT '',
		PRIMARY KEY id (id)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

	$wpdb->query( $sql );

	/* Insert some default data */
	$wpdb->query("INSERT INTO `". $table_name ."` (`chname`, `server`, `linkshell`, `lscomurl`)
		VALUES ('".$wpdb->escape($user_identity)."', 'Asura', '', '')");

	add_option('ffxi_db_version', $ffxi_db_version);
	add_option('ffxi_options', $ffxi_options, 'FFXI Plugin Options');
}

$scrape_meta = $wpdb->prefix."ffxi_scrapemeta";
if($wpdb->get_var("SHOW TABLES LIKE '$scrape_meta'") != $scrape_meta) {
	$sql = "CREATE TABLE IF NOT EXISTS ".$scrape_meta." (
		`meta_id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
		`meta_key` VARCHAR(255) DEFAULT NULL,
		`meta_value` LONGTEXT,
		PRIMARY KEY (`meta_id`)
		KEY `meta_key` (`meta_key`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

	$wpdb->query( $sql );
}

/* Upgrade */
$installed_ver = get_option("ffxi_db_version");
if($installed_ver != $ffxi_db_version) {
	// Update information in the wp_options table
	delete_option('ffxi_options');
	update_option('ffxi_options', $ffxi_options);

	$wpdb->ffxistats_weapon = $wpdb->prefix.'ffxistats_weapon';
	$wpdb->ffxistats_combat = $wpdb->prefix.'ffxistats_combat';
	$wpdb->ffxistats_magic = $wpdb->prefix.'ffxistats_magic';

	// Drop unused tables
	if($wpdb->get_var("SHOW TABLES LIKE '$wpdb->ffxistats_weapon'") == $wpdb->ffxistats_weapon) {
		$sql = "DROP TABLE IF EXISTS ".$wpdb->ffxistats_weapon.;
	}
	$wpdb->query( $sql );

	if($wpdb->get_var("SHOW TABLES LIKE '$wpdb->ffxistats_combat'") == $wpdb->ffxistats_combat) {
		$sql = "DROP TABLE IF EXISTS ".$wpdb->ffxistats_combat.;
	}
	$wpdb->query( $sql );

	if($wpdb->get_var("SHOW TABLES LIKE '$wpdb->ffxistats_magic'") == $wpdb->ffxistats_magic) {
		$sql = "DROP TABLE IF EXISTS ".$wpdb->ffxistats_magic.;
	}
	$wpdb->query( $sql );

	// Alter existing FFXISTATS table
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
		$sql = "ALTER TABLE ".$table_name." DROP COLUMN `nation`, DROP COLUMN `race`, DROP COLUMN `sex`, ADD COLUMN `lscomurl` VARCHAR(100) NOT NULL DEFAULT '' AFTER `linkshell`";
	}
	$wpdb->query( $sql );
	update_option('ffxi_db_version', $ffxi_db_version);
}
?>