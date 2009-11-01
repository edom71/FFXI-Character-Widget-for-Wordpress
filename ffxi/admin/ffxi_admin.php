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

# Adding Top Level menu and sub-menus
add_action('admin_menu', 'add_ffxi_menu');

function add_ffxi_menu() {
	# Top Level - FFXI Stats
	add_menu_page('FFXI Profile', 'FFXI Stats', 'Change FFXI Stats', FFXIFOLDER, 'show_ffxi_menu');
	
	# Submenu - Profile
	add_submenu_page(FFXIFOLDER, 'Profile', 'Profile', 'Change FFXI Stats', 'profile', 'show_ffxi_menu');
	
	# Submenu - Job Stats
	add_submenu_page(FFXIFOLDER, 'Job Stats', 'Job Stats', 'Change FFXI Stats', 'job-stats', 'show_ffxi_menu');
	
	# Submenu - Crafting Stats
	add_submenu_page(FFXIFOLDER, 'Crafting Stats', 'Crafting Stats', 'Change FFXI Stats', 'crafting-stats', 'show_ffxi_menu');
	
	# Submenu - WS Stats
	add_submenu_page(FFXIFOLDER, 'WS Stats', 'WS Stats', 'Change FFXI Stats', 'ws-stats', 'show_ffxi_menu');
	
	# Submenu - Combat Stats
	add_submenu_page(FFXIFOLDER, 'Combat Stats', 'Combat Stats', 'Change FFXI Stats', 'combat-stats', 'show_ffxi_menu');
	
	# Submenu - Magic Stats
	add_submenu_page(FFXIFOLDER, 'Magic Stats', 'Magic Stats', 'Change FFXI Stats', 'magic-stats', 'show_ffxi_menu');
	
	# Submenu - Mission Stats
	add_submenu_page(FFXIFOLDER, 'Mission Stats', 'Mission Stats', 'Change FFXI Stats', 'mission-stats', 'show_ffxi_menu');
	
	# Submenu - Setup
	// add_submenu_page(FFXIFOLDER, 'Setup', 'Setup', 'Change FFXI Stats', 'setup', 'show_ffxi_menu');
}

function show_ffxi_menu() {
	switch ($_GET["page"]) {
		case "profile" :
			include_once (dirname (__FILE__). '/profile.php');
			ffxi_profile();
			break;
		case "job-stats" :
			include_once (dirname (__FILE__). '/jobs.php');
			ffxi_job_stats();
			break;
		case "crafting-stats" :
			include_once (dirname (__FILE__). '/crafting.php');
			ffxi_crafting_stats();
			break;
		case "ws-stats" :
			include_once (dirname (__FILE__). '/ws.php');
			ffxi_ws_stats();
			break;
		case "combat-stats" :
			include_once (dirname (__FILE__). '/combat.php');
			ffxi_combat_stats();
			break;
		case "magic-stats" :
			include_once (dirname (__FILE__). '/magic.php');
			ffxi_magic_stats();
			break;
		case "mission-stats" :
			include_once (dirname (__FILE__). '/mission.php');
			ffxi_mission_stats();
			break;
		/* case "setup" :
			include_once (dirname (__FILE__). '/setup.php');
			ffxi_setup();
			break; */
		case "ffxi" :
		default :
			include_once (dirname (__FILE__). '/preview.php');
			ffxi_preview();
			break;
	}
}


?>