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

function ffxi_setup() {
	global $wpdb;
	
	# Uninstall databases
	if (isset($_POST['uninstall'])) {
		check_admin_referer('ffxi_uninstall');
		
		$wpdb->query("DROP TABLE $wpdb->ffxistats");
		$wpdb->query("DROP TABLE $wpdb->ffxistats_jobs");
		$wpdb->query("DROP TABLE $wpdb->ffxistats_ajobs");
		$wpdb->query("DROP TABLE $wpdb->ffxistats_craft");
		$wpdb->query("DROP TABLE $wpdb->ffxistats_weapon");
		$wpdb->query("DROP TABLE $wpdb->ffxistats_combat");
		$wpdb->query("DROP TABLE $wpdb->ffxistats_magic");
		$wpdb->query("DROP TABLE $wpdb->ffxistats_mission");
		
		delete_option("ffxi_options");
		delete_options("ffxi_db_version");
		
		ffxi_remove_capability("Change FFXI Stats");
		
		$messagetext = '<font color="green">Uninstall successful! Now delete the plugin to complete the uninstall</font>';
	}
	if(!empty($messagetext)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$messagetext.'</p></div>'; }
	?>
    <div class="wrap">
    	<h2>Uninstall Plugin Tables</h2>
        <form name="unplug" method="post">
        	<p>You don't like this plugin?</p>
            <p>No problem. Before you deactivate this plugin, press the uninstall button. Deactivating this plugin does not remove any data that may have been created.</p>
            <p><font color="red"><strong>WARNING:</strong><br />Once uninstalled, this cannont be undone. You should use a Database Backup plugin for WordPress to backup all the tables first. Information for this plugin is stored in the following tables: <strong><?php echo $wpdb->ffxistats; ?></strong>, <strong><?php echo $wpdb->ffxistats_jobs; ?></strong>, <strong><?php echo $wpdb->ffxistats_ajobs; ?></strong>, <strong><?php echo $wpdb->ffxistats_craft; ?></strong>, <strong><?php echo $wpdb->ffxistats_weapon; ?></strong>, <strong><?php echo $wpdb->ffxistats_combat; ?></strong>, <strong><?php echo $wpdb->ffxistats_magic; ?></strong>, and <strong><?php echo $wpdb->ffxistats_mission; ?></strong></font>.
            <div align="center">
            	<input type="submit" name="uninstall" class="button delete" value="Uninstall Plugin" onClick='javascript:check=confirm("You are about to Uninstall this plugin from WordPress.\nThis action is not reversible.\n\nChoose [Cancel] to Stop, [OK] to Uninstall.\n");if(check==false) return false;' />
            </div>
        </form>
    </div>
  	<?php
}

function ffxi_remove_capability($capability){
	// This function remove the $capability
	$check_order = array("subscriber", "contributor", "author", "editor", "administrator");

	foreach ($check_order as $role) {
		
		$role = get_role($role);
		$role->remove_cap($capability) ;
	}
	
}
?>