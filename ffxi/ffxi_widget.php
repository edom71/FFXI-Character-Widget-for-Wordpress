<?php
/*
Plugin Name: FFXI Character Stats Widget
Description: A sidebar widget for your stats.
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

function widget_ffxi() {
	if ( !function_exists('register_sidebar_widget') )
		return;
	
	function widget_ffxi_show($args) {
		extract($args);
		
		global $wpdb;
		
		# Retrive Display Settings
		$ffxi_options = get_option('ffxi_options');
		
		# Retrieve Values from database tables
		$profilelist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats WHERE id=0"); // Profile Info
		foreach($profilelist as $profile) {
			$chname = $profile->chname;
			$world = $profile->server;
			$nation = $profile->nation;
			$race = $profile->race;
			$sex = $profile->sex;
			$rank = $profile->rank;
			$ls = $profile->linkshell;
		}
		$jobslist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats_jobs WHERE id=0"); // Basic Jobs
		foreach($jobslist as $job) {
			$whm = $job->whmlvl;
			$blm = $job->blmlvl;
			$rdm = $job->rdmlvl;
			$war = $job->warlvl;
			$thf = $job->thflvl;
			$mnk = $job->mnklvl;
		}
		$ajobslist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats_ajobs WHERE id=0"); // Adv. Jobs
		foreach($ajobslist as $ajob) {
			if ($ajob->pldlvl != 0)
				$pld = $ajob->pldlvl;
			else
				$pld = "-";
			if ($ajob->samlvl != 0)
				$sam = $ajob->samlvl;
			else
				$sam = "-";
			if ($ajob->ninlvl != 0)
				$nin = $ajob->ninlvl;
			else
				$nin = "-";
			if ($ajob->smnlvl != 0)
				$smn = $ajob->smnlvl;
			else
				$smn = "-";
			if ($ajob->rnglvl != 0)
				$rng = $ajob->rnglvl;
			else
				$rng = "-";
			if ($ajob->drglvl != 0)
				$drg = $ajob->drglvl;
			else
				$drg = "-";
			if ($ajob->drklvl != 0)
				$drk = $ajob->drklvl;
			else
				$drk = "-";
			if ($ajob->blulvl != 0)
				$blu = $ajob->blulvl;
			else
				$blu = "-";
			if ($ajob->corlvl != 0)
				$cor = $ajob->corlvl;
			else
				$cor = "-";
			if ($ajob->puplvl != 0)
				$pup = $ajob->puplvl;
			else
				$pup = "-";
			if ($ajob->dnclvl != 0)
				$dnc = $ajob->dnclvl;
			else
				$dnc = "-";
			if ($ajob->schlvl != 0)
				$sch = $ajob->schlvl;
			else
				$sch = "-";
			if ($ajob->bstlvl != 0)
				$bst = $ajob->bstlvl;
			else
				$bst = "-";
			if ($ajob->brdlvl != 0)
				$brd = $ajob->brdlvl;
			else
				$brd = "-";
		}
		$craftlist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats_craft WHERE id=0"); // Crafting Skills
		foreach($craftlist as $craft){
			$alrnk = $craft->alch_rnk;
			$allvl = $craft->alch_lvl;
			$bsrnk = $craft->bsmith_rnk;
			$bslvl = $craft->bsmith_lvl;
			$bnrnk = $craft->bone_rnk;
			$bnlvl = $craft->bone_lvl;
			$clrnk = $craft->cloth_rnk;
			$cllvl = $craft->cloth_lvl;
			$ckrnk = $craft->cook_rnk;
			$cklvl = $craft->cook_lvl;
			$fsrnk = $craft->fish_rnk;
			$fslvl = $craft->fish_lvl;
			$gsrnk = $craft->gsmith_rnk;
			$gslvl = $craft->gsmith_lvl;
			$ltrnk = $craft->lthr_rnk;
			$ltlvl = $craft->lthr_lvl;
			$wdrnk = $craft->wood_rnk;
			$wdlvl = $craft->wood_lvl;
		}
		$weaponlist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats_weapon WHERE id=0"); // Weapon Skills
		foreach($weaponlist as $weapon) {
			$archws = $weapon->arch_ws;
			$axews = $weapon->axe_ws;
			$clubws = $weapon->club_ws;
			$dagws = $weapon->dagger_ws;
			$graxews = $weapon->graxe_ws;
			$grkatws = $weapon->grkat_ws;
			$grswdws = $weapon->grswd_ws;
			$h2hws = $weapon->h2h_ws;
			$katws = $weapon->kat_ws;
			$markws = $weapon->mark_ws;
			$polews = $weapon->pole_ws;
			$scyws = $weaon->scythe_ws;
			$staffws = $weapon->staff_ws;
			$swdws = $weapon->swd_ws;
		}
		$combatlist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats_combat WHERE id=0"); // Combast Skills
		foreach($combatlist as $combat) {
			$arch = $combat->arch_lvl;
			$axe = $combat->axe_lvl;
			$club = $combat->club_lvl;
			$dagger = $combat->dagger_lvl;
			$eva = $combat->evasion_lvl;
			$graxe = $combat->graxe_lvl;
			$grkat = $combat->grkat_lvl;
			$grswd = $combat->grswd_lvl;
			$guard = $combat->guard_lvl;
			$h2h = $combat->h2h_lvl;
			$kat = $combat->kat_lvl;
			$mark = $combat->mark_lvl;
			$parry = $combat->parry_lvl;
			$pole = $combat->pole_lvl;
			$scythe = $combat->scythe_lvl;
			$shield = $combat->shield_lvl;
			$staff = $combat->staff_lvl;
			$sword = $combat->sword_lvl;
			$throw = $combat->throw_lvl;
		}
		$magiclist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats_magic WHERE id=0"); // Magic Skills
		foreach($magiclist as $magic) {
			$dark = $magic->dark;
			$divine = $magic->divine;
			$ele = $magic->elemental;
			$enf = $magic->enfeebling;
			$enh = $magic->enhancing;
			$heal = $magic->healing;
			$ninj = $magic->ninjutsu;
			$summ = $magic->summoning;
			$blue = $magic->blue;
		}
		$missionlist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats_mission WHERE id=0"); // Mission Info
		foreach($missionlist as $mission) {
			$bas = $mission->bastok;
			$wind = $mission->windy;
			$sand = $mission->sandy;
			$zil = $mission->zilart;
			$cop = $mission->promathia;
			$toau = $mission->ahturhgan;
			$wog = $mission->altana;
			$crys = $mission->crystalline;
			$evil = $mission->evilsmalldose;
		}
		
		$title = $chname . "'s Stats";
		
		$showsec = '<div class="ffxi-sec">';
		$hidesec = '<div class="ffxi-sec" style="display: none;">';
		
		$protable = '
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td><div class="ffxi-cap">Profile</div></td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td class="ffxi-item" width="50%">World</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $world .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Nation</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $nation .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Race</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $race .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Sex</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $sex .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Rank</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $rank .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Linkshell</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $ls .'</td>
			</tr>
		</table></div>';
		$bjobtable = '
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td><div class="ffxi-cap">Basic Jobs</div></td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td class="ffxi-item" width="50%">Warrior</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $war .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">White Mage</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $whm .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Red Mage</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $rdm .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Monk</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $mnk .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Black Mage</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $blm .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Thief</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $thf .'</td>
			</tr>
		</table></div>';
		$ajobtable = '
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td><div class="ffxi-cap">Adv. Jobs</div></td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td class="ffxi-item" width="50%">Paladin</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $pld .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Dark Knight</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $drk .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Beastmaster</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $bst .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Bard</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $brd .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Ranger</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $rng .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Summoner</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $smn .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Samurai</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $sam .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Ninja</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $nin .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Dragoon</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $drg .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Blue Mage</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $blu. '</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Corsair</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $cor .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Puppetmaster</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $pup .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Dancer</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $dnc .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Scholar</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $sch .'</td>
			</tr>
		</table></div>';
		$crafttable ='
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td><div class="ffxi-cap">Craft Skills</div></td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td class="ffxi-item" width="30%">Alchemy</td>
				<td width="15%">&nbsp;</td>
				<td class="ffxi-value" width="50%">'. $alrnk .'</td>
				<td class="ffxi-value" width="5%">['. $allvl .']</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="30%">Blacksmithing</td>
				<td width="15%">&nbsp;</td>
				<td class="ffxi-value" width="50%">'. $bsrnk .'</td>
				<td class="ffxi-value" width="5%">['. $bslvl .']</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="30%">Bonecraft</td>
				<td width="15%">&nbsp;</td>
				<td class="ffxi-value" width="50%">'. $bnrnk .'</td>
				<td class="ffxi-value" width="5%">['. $bnlvl .']</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="30%">Clothcraft</td>
				<td width="15%">&nbsp;</td>
				<td class="ffxi-value" width="50%">'. $clrnk .'</td>
				<td class="ffxi-value" width="5%">['. $cllvl .']</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="30%">Cooking</td>
				<td width="15%">&nbsp;</td>
				<td class="ffxi-value" width="50%">'. $ckrnk .'</td>
				<td class="ffxi-value" width="5%">['. $cklvl .']</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="30%">Fishing</td>
				<td width="15%">&nbsp;</td>
				<td class="ffxi-value" width="50%">'. $fsrnk .'</td>
				<td class="ffxi-value" width="5%">['. $fslvl .']</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="30%">Goldsmithing</td>
				<td width="15%">&nbsp;</td>
				<td class="ffxi-value" width="50%">'. $gsrnk .'</td>
				<td class="ffxi-value" width="5%">['. $gslvl .']</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="30%">Leathercraft</td>
				<td width="15%">&nbsp;</td>
				<td class="ffxi-value" width="50%">'. $ltrnk .'</td>
				<td class="ffxi-value" width="5%">['. $ltlvl .']</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="30%">Woodworking</td>
				<td width="15%">&nbsp;</td>
				<td class="ffxi-value" width="50%">'. $wdrnk .'</td>
				<td class="ffxi-value" width="5%">['. $wdlvl .']</td>
			</tr>
		</table></div>';
		$wstable ='
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td><div class="ffxi-cap">Weapon Skills</div></td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td class="ffxi-item" width="50%">Archery</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $archws .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Axe</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $axews .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Club</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $clubws .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Dagger</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $dagws .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Great Axe</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $graxews .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Great Katana</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $grkatws .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Great Sword</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $grswdws .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Hand-to-Hand</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $h2hws .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Katana</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $katws .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Marksmanship</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $markws .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Polearm</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $polews .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Scythe</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $scyhws .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Staff</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $staffws .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Sword</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $swdws .'</td>
			</tr>
		</table></div>';
		$comtable = '
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td><div class="ffxi-cap">Combat Skills</div></td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td class="ffxi-item" width="50%">Archery</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $arch .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Axe</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $axe .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Club</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $club .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Dagger</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $dagger .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Evasion</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $eva .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Great Axe</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $graxe .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Great Katana</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $grkat .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Great Sword</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $grswd .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Guarding</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $guard .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Hand-to-Hand</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $h2h .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Katana</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $kat .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Marksmanship</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $mark .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Parrying</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $parry .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Polearm</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $pole .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Scythe</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $scythe .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Shield</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $shield .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Staff</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $staff .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Sword</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $sword .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Throwing</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $throw .'</td>
			</tr>
		</table></div>';
		$magtable ='
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td><div class="ffxi-cap">Magic Skills</div></td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td class="ffxi-item" width="50%">Dark</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $dark .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Divine</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $divine .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Elemental</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $ele .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Enfeebling</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $enf .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Enhancing</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $enh .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Healing</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $heal .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Ninjutsu</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $ninj .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Summoning</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $summ .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Blue Magic</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value" width="45%">'. $blue .'</td>
			</tr>
		</table></div>';
		$mistable ='
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td><div class="ffxi-cap">Missions</div></td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td class="ffxi-item" width="50%">Bastok</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value">'. $bas .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">Windurst</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value">'. $wind .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">San d&#039;Oria</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value">'. $sand .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">RoZ</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value">'. $zil .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">CoP</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value">'. $cop .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">ToAU</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value">'. $toau .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">WotG</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value">'. $wog .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">ACP</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value">'. $crys .'</td>
			</tr>
			<tr>
				<td class="ffxi-item" width="50%">AMK</td>
				<td width="5%">&nbsp;</td>
				<td class="ffxi-value">'. $evil .'</td>
			</tr>
		</table></div>';
		
		echo $before_widget;
		echo $before_title . $title . $after_title;
		echo '<div style="width: 175px">';
		if(!$ffxi_options[showpro]) {
			echo $hidesec . $protable;
		} else {
			echo $showsec . $protable;
		}
		if(!$ffxi_options[showbjob]) {
			echo $hidesec . $bjobtable;
		} else {
			echo $showsec . $bjobtable;
		}
		if(!$ffxi_options[showajob]) {
			echo $hidesec . $ajobtable;
		} else {
			echo $showsec . $ajobtable;
		}
		if(!$ffxi_options[showcraft]) {
			echo $hidesec . $crafttable;
		} else {
			echo $showsec . $crafttable;
		}
		if(!$ffxi_options[showws]) {
			echo $hidesec . $wstable;
		} else {
			echo $showsec . $wstable;
		}
		if(!$ffxi_options[showcom]) {
			echo $hidesec . $comtable;
		} else {
			echo $showsec . $comtable;
		}
		if(!$ffxi_options[showmag]) {
			echo $hidesec . $magtable;
		} else {
			echo $showsec . $magtable;
		}
		if(!$ffxi_options[showmis]) {
			echo $hidesec . $mistable;
		} else {
			echo $showsec . $mistable;
		}
		echo '</div>';
		echo $after_widget;
	}
	
	register_sidebar_widget('FFXI Stats', 'widget_ffxi_show');
}

function ffxi_head() { ?>
<link type="text/css" rel="stylesheet" href="<?php echo FFXI_URLPATH ?>ffxi.css" media="screen" />
<?php }
add_action('wp_head', 'ffxi_head');
add_action('widgets_init', 'widget_ffxi');

?>