<?php
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

# Install MySQL Table: FFXIStats
function ffxiplug_install() {
	global $wpdb, $wp_version;
	global $ffxi_db_version;
	global $user_identity;

	# Database Version - Change on any updates
	$ffxi_db_version = "3.1";

	get_currentuserinfo();

	add_option('ffxi_db_version', $ffxi_db_version);

	# Check for capability
	if ( !current_user_can('activate_plugins') )
		return;

	# Set capabilities for the admin
	$role = get_role('administrator');
	$role->add_cap('Change FFXI Stats');

	# Upgrade function changed in WP 2.3
	if (version_compare($wp_version, '2.3-beta', '>='))
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	else
		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');

	$ffxistats = $wpdb->prefix.'ffxistats';
	$ffxistats_jobs = $wpdb->prefix.'ffxistats_jobs';
	$ffxistats_ajobs = $wpdb->prefix.'ffxistats_ajobs';
	$ffxistats_craft = $wpdb->prefix.'ffxistats_craft';
	$ffxistats_weapon = $wpdb->prefix.'ffxistats_weapon';
	$ffxistats_combat = $wpdb->prefix.'ffxistats_combat';
	$ffxistats_magic = $wpdb->prefix.'ffxistats_magic';
	$ffxistats_mission = $wpdb->prefix.'ffxistats_mission';

	if ($wpdb->get_var("SHOW TABLES LIKE '$ffxistats'") != $ffxistats) {
		$sql = "CREATE TABLE " . $ffxistats . " (
			id int(11) NOT NULL default '0',
			chname varchar(100) NOT NULL default '',
			server varchar(45) NOT NULL default '',
			nation varchar(30) NOT NULL default '',
			race varchar(25) NOT NULL default '',
			sex varchar(100) NOT NULL default '',
			rank int(11) NOT NULL default '1',
			linkshell varchar(200) NOT NULL default '',
			PRIMARY KEY id (id)
			) TYPE=MyISAM;";

	  	dbDelta($sql);

		# Insert default values to ffxistats database table
		$chname = "$user_identity";
		$server = "Asura";
		$nation = "Bastok";
		$race = "Hume";
		$sex = "Male";
		$rank = 1;
		$ls = "";

		$insert = "INSERT INTO " . $ffxistats .
			" (chname, server, nation, race, sex, rank, linkshell) " .
			"VALUES ('". $wpdb->escape($chname) ."', '". $wpdb->escape($server) ."', '". $wpdb->escape($nation) ."', '". $wpdb->escape($race) ."', '". $wpdb->escape($sex) ."', '". $wpdb->escape($rank) ."', '". $wpdb->escape($ls) ."')";

		$results = $wpdb->query($insert);
		ffxi_default_options();
		add_option("ffxi_db_version", $ffxi_db_version);
	}

	if  ($wpdb->get_var("SHOW TABLES LIKE '$ffxistats_jobs'") != $ffxistats_jobs) {
		$sql = "CREATE TABLE " . $ffxistats_jobs . "(
			id int(11) NOT NULL default '0',
			warlvl int(11) NOT NULL default '1',
			whmlvl int(11) NOT NULL default '1',
			rdmlvl int(11) NOT NULL default '1',
			mnklvl int(11) NOT NULL default '1',
			blmlvl int(11) NOT NULL default '1',
			thflvl int(11) NOT NULL default '1',
			PRIMARY KEY id (id)
			) TYPE=MyISAM;";

		  dbDelta($sql);

		  # Insert default values into ffxistats_jobs database table
		  $one = 1;
		  $zero = 0;

		  $insert = "INSERT INTO " . $ffxistats_jobs .
		  	" (warlvl, whmlvl, rdmlvl, mnklvl, blmlvl, thflvl) " .
			"VALUES ('". $one ."', '". $one ."', '". $one ."', '". $one ."', '". $one ."', '". $one ."')";

		$result = $wpdb->query($insert);
	}

	if  ($wpdb->get_var("SHOW TABLES LIKE '$ffxistats_ajobs'") != $ffxistats_ajobs) {
		$sql = "CREATE TABLE " . $ffxistats_ajobs . "(
			id int(11) NOT NULL default '0',
			pldlvl int(11) NOT NULL default '0',
			drklvl int(11) NOT NULL default '0',
			bstlvl int(11) NOT NULL default '0',
			brdlvl int(11) NOT NULL default '0',
			rnglvl int(11) NOT NULL default '0',
			smnlvl int(11) NOT NULL default '0',
			samlvl int(11) NOT NULL default '0',
			ninlvl int(11) NOT NULL default '0',
			drglvl int(11) NOT NULL default '0',
			blulvl int(11) NOT NULL default '0',
			corlvl int(11) NOT NULL default '0',
			puplvl int(11) NOT NULL default '0',
			dnclvl int(11) NOT NULL default '0',
			schlvl int(11) NOT NULL default '0',
			PRIMARY KEY id (id)
			) TYPE=MyISAM;";

		  dbDelta($sql);

		  # Insert default values into ffxistats_jobs database table
		  $one = 1;
		  $zero = 0;
		  
		  $insert = "INSERT INTO " . $ffxistats_ajobs .
		  	" (pldlvl, drklvl, bstlvl, brdlvl, rnglvl, smnlvl, samlvl, ninlvl, drglvl, blulvl, corlvl, puplvl, dnclvl, schlvl) " .
			"VALUES ('". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."', '". $zero ."')";

		$result = $wpdb->query($insert);
	}

	if ($wpdb->get_var("SHOW TABLES LIKE '$ffxistats_craft'") != $ffxistats_craft) {
		$sql = "CREATE TABLE " . $ffxistats_craft . "(
			id int(11) NOT NULL default '0',  
			alch_rnk varchar(50) NOT NULL default '',
			alch_lvl int(11) NOT NULL default '0',
	 		bsmith_rnk varchar(50) NOT NULL default '',
			bsmith_lvl int(11) NOT NULL default '0',
			bone_rnk varchar(50) NOT NULL default '',
			bone_lvl int(11) NOT NULL default '0',
			cloth_rnk varchar(50) NOT NULL default '',
			cloth_lvl int(11) NOT NULL default '0',
			cook_rnk varchar(50) NOT NULL default '',
			cook_lvl int(11) NOT NULL default '0',
			fish_rnk varchar(50) NOT NULL default '',
			fish_lvl int(11) NOT NULL default '0',
			gsmith_rnk varchar(50) NOT NULL default '',
			gsmith_lvl int(11) NOT NULL default '0',
			lthr_rnk varchar(50) NOT NULL default '',
			lthr_lvl int(11) NOT NULL default '0',
			wood_rnk varchar(50) NOT NULL default '',
			wood_lvl int(11) NOT NULL default '0',
			PRIMARY KEY id (id)
			) TYPE=MyISAM;";

		  dbDelta($sql);

		  # Insert default values into ffxistats_craft database table
		  $rnk = "Amateur";
		  $lvl = 0;

		  $insert = "INSERT INTO " . $ffxistats_craft .
		  	" (alch_rnk, alch_lvl, bsmith_rnk, bsmith_lvl, bone_rnk, bone_lvl, cloth_rnk, cloth_lvl, cook_rnk, cook_lvl, fish_rnk, fish_lvl, gsmith_rnk, gsmith_lvl, lthr_rnk, lthr_lvl, wood_rnk, wood_lvl) " .
			"VALUES('". $wpdb->escape($rnk) ."', '". $lvl ."', '". $wpdb->escape($rnk) ."', '". $lvl ."', '". $wpdb->escape($rnk) ."', '". $lvl ."', '". $wpdb->escape($rnk) ."', '". $lvl ."', '". $wpdb->escape($rnk) ."', '". $lvl ."', '". $wpdb->escape($rnk) ."', '". $lvl ."', '". $wpdb->escape($rnk) ."', '". $lvl ."', '". $wpdb->escape($rnk) ."', '". $lvl ."', '". $wpdb->escape($rnk) ."', '". $lvl ."')";

		$result = $wpdb->query($insert);
	}

	if ($wpdb->get_var("SHOW TABLES LIKE '$ffxistats_weapon'") != $ffxistats_weapon) {
		$sql = "CREATE TABLE " . $ffxistats_weapon . "(
			id int(11) NOT NULL default '0',
			arch_ws varchar(200) NOT NULL default '',
			axe_ws varchar(200) NOT NULL default '',
			club_ws varchar(200) NOT NULL default '',
			dagger_ws varchar(200) NOT NULL default '',
			graxe_ws varchar(200) NOT NULL default '',
			grkat_ws varchar(200) NOT NULL default '',
			grswd_ws varchar(200) NOT NULL default '',
			h2h_ws varchar(200) NOT NULL default '',
			kat_ws varchar(200) NOT NULL default '',
			mark_ws varchar(200) NOT NULL default '',
			pole_ws varchar(200) NOT NULL default '',
			scythe_ws varchar(200) NOT NULL default '',
			staff_ws varchar(200) NOT NULL default '',
			swd_ws varchar(200) NOT NULL default '',
			PRIMARY KEY id (id)
			) TYPE=MyISAM;";

		dbDelta($sql);

		# Insert default values into ffxistats_weapon database table
		$blnk = "";

		$insert = "INSERT INTO " . $ffxistats_weapon .
			" (arch_ws, axe_ws, club_ws, dagger_ws, graxe_ws, grkat_ws, grswd_ws, h2h_ws, kat_ws, mark_ws, pole_ws, scythe_ws, staff_ws, swd_ws) " .
			"VALUES('". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."')";

		$result = $wpdb->query($insert);	
	}

	if ($wpdb->get_var("SHOW TABLES LIKE '$ffxistats_combat'") != $ffxistats_combat) {
		$sql = "CREATE TABLE " . $ffxistats_combat . "(
			id int(11) NOT NULL default '0',
			arch_lvl int(11) NOT NULL default '0',
			axe_lvl int(11) NOT NULL default '0',
			club_lvl int(11) NOT NULL default '0',
			dagger_lvl int(11) NOT NULL default '0',
			evasion_lvl int(11) NOT NULL default '0',
			graxe_lvl int(11) NOT NULL default '0',
			grkat_lvl int(11) NOT NULL default '0',
			grswd_lvl int(11) NOT NULL default '0',
			guard_lvl int(11) NOT NULL default '0',
			h2h_lvl int(11) NOT NULL default '0',
			kat_lvl int(11) NOT NULL default '0',
			mark_lvl int(11) NOT NULL default '0',
			parry_lvl int(11) NOT NULL default '0',
			pole_lvl int(11) NOT NULL default '0',
			scythe_lvl int(11) NOT NULL default '0',
			shield_lvl int(11) NOT NULL default '0',
			staff_lvl int(11) NOT NULL default '0',
			sword_lvl int(11) NOT NULL default '0',
			throw_lvl int(11) NOT NULL default '0',
			PRIMARY KEY id (id)
			) TYPE=MyISAM;";

		dbDelta($sql);

		# Insert default values into ffxistats_combat database table
		$null = 0;

		$insert = "INSERT INTO " . $ffxistats_combat .
			" (arch_lvl, axe_lvl, club_lvl, dagger_lvl, evasion_lvl, graxe_lvl, grkat_lvl, grswd_lvl, guard_lvl, h2h_lvl, kat_lvl, mark_lvl, parry_lvl, pole_lvl, scythe_lvl, shield_lvl, staff_lvl, sword_lvl, throw_lvl) " .
			"VALUES('". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."')";

		$result = $wpdb->query($insert);
	}

	if ($wpdb->get_var("SHOW TABLES LIKE '$ffxistats_magic'") != $ffxistats_magic) {
		$sql = "CREATE TABLE " . $ffxistats_magic . "(
			id int(11) NOT NULL default '0',
			dark int(11) NOT NULL default '0',
			divine int(11) NOT NULL default '0',
			elemental int(11) NOT NULL default '0',
			enfeebling int(11) NOT NULL default '0',
			enhancing int(11) NOT NULL default '0',
			healing int(11) NOT NULL default '0',
			ninjutsu int(11) NOT NULL default '0',
			summoning int(11) NOT NULL default '0',
			blue int(11) NOT NULL default '0',
			PRIMARY KEY id (id)
			) TYPE=MyISAM;";

		dbDelta($sql);

		# Insert default values into ffxistats_magic database table
		$null = 0;

		$insert = "INSERT INTO " . $ffxistats_magic .
			" (dark, divine, elemental, enfeebling, enhancing, healing, ninjutsu, summoning, blue) " .
			"VALUES('". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."', '". $null ."')";

		$result = $wpdb->query($insert);
	}

	if ($wpdb->get_var("SHOW TABLES LIKE '$ffxistats_mission'") != $ffxistats_mission) {
		$sql = "CREATE TABLE " . $ffxistats_mission . "(
			id int(11) NOT NULL default '0',
			bastok varchar(200) NOT NULL default '',
			windy varchar(200) NOT NULL default '',
			sandy varchar(200) NOT NULL default '',
			zilart varchar(200) NOT NULL default '',
			promathia varchar(200) NOT NULL default '',
			ahturhgan varchar(200) NOT NULL default '',
			altana varchar(200) NOT NULL default '',
			crystalline varchar(200) NOT NULL default '',
			evilsmalldose varchar(200) NOT NULL default '',
			shantotto varchar(200) NOT NULL default '',
			PRIMARY KEY id (id)
			) TYPE=MyISAM;";

		dbDelta($sql);

		# Insert default values into ffxistats_mission database table
		$blnk = "";

		$insert = "INSERT INTO " . $ffxistats_mission .
			" (bastok, windy, sandy, zilart, promathia, ahturhgan, altana, crystalline, evilsmalldose, shantotto) " .
			"VALUES('". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."', '". $blnk ."')";

		$result = $wpdb->query($insert);
	}

	# Check db Version
	$installed_ver = get_option("ffxi_db_version");
	if ($installed_ver != $ffxi_db_version) {
		# Any updates to plugin go here
		$wpdb->query("ALTER TABLE ".$ffxistats_mission." ADD shantotto varchar(200) NOT NULL default ''" );
		update_option("ffxi_db_version", $ffxi_db_version);
	}
}

function ffxi_default_options() {
	$ffxi_options['showpro'] = true;
	$ffxi_options['showbjob'] = true;
	$ffxi_options['showajob'] = true;
	$ffxi_options['showcraft'] = true;
	$ffxi_options['showws'] = true;
	$ffxi_options['showcom'] = true;
	$ffxi_options['showmag'] = true;
	$ffxi_options['showmis'] = true;

	update_option('ffxi_options', $ffxi_options);
}

?>