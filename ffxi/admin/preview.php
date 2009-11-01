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

####
# Add form/option to hide tables: style="display: none;" gets added to <div class="ffxi-sec">
###

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

function ffxi_preview() {
	global $wpdb;

	// ini_set('error_reporting', E_ALL);
	$ffxi_options=get_option('ffxi_options');

	if (isset($_POST['updateopt'])) {
		check_admin_referer('ffxi_show');
		if ($_POST['page_options'])
			$options = explode(',', stripslashes($_POST['page_options']));
		if ($options) {
			foreach ($options as $option) {
				$option = trim($option);
				$value = trim($_POST[$option]);
				$ffxi_options[$option] = $value;
			}
		}

		update_option('ffxi_options', $ffxi_options);
		$messagetext = '<font color="green">Update Successful</font>';
	}

	if (!empty($messagetext)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$messagetext.'</p></div>'; }

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
		$pld = $ajob->pldlvl;
		$sam = $ajob->samlvl;
		$nin = $ajob->ninlvl;
		$smn = $ajob->smnlvl;
		$rng = $ajob->rnglvl;
		$drg = $ajob->drglvl;
		$drk = $ajob->drklvl;
		$blu = $ajob->blulvl;
		$cor = $ajob->corlvl;
		$pup = $ajob->puplvl;
		$dnc = $ajob->dnclvl;
		$sch = $ajob->schlvl;
		$bst = $ajob->bstlvl;
		$brd = $ajob->brdlvl;
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
		$shan = $mission->shantotto;
	}
	
	?>
	<link type="text/css" rel="stylesheet" href="<?php echo FFXI_URLPATH ?>ffxi.css" media="screen" />

	<h2><?php echo "".$chname."'s"; ?> Stats Preview</h2>
	<div class="wrap">
			<div style="float:right">
			<div class="wrap">
				<div id="showset">
					<form name="showset" method="post">
						<?php wp_nonce_field('ffxi_show'); ?>
						<input type="hidden" name="page_options" value="showpro,showbjob,showajob,showcraft,showws,showcom,showmag,showmis" />
						<fieldset class="options">
							<table class="optiontable editform">
								<tr align="center">
									<td colspan="2"><strong>Show these tables:</strong></td>
								</tr>
								<tr valign="top">
									<td align="left">Show Profile</td>
									<td><input type="checkbox" name="showpro" value="1" <?php checked('1', $ffxi_options[showpro]); ?> /></td>
								</tr>
								<tr valign="top">
									<td align="left">Show Basic Jobs</td>
									<td><input type="checkbox" name="showbjob" value="1" <?php checked('1', $ffxi_options[showbjob]); ?> /></td>
								</tr>
								<tr valign="top">
									<td align="left">Show Adv. Jobs</td>
									<td><input type="checkbox" name="showajob" value="1" <?php checked('1', $ffxi_options[showajob]); ?> /></td>
								</tr>
								<tr valign="top">
									<td align="left">Show Craft Skills</td>
									<td><input type="checkbox" name="showcraft" value="1" <?php checked('1', $ffxi_options[showcraft]); ?> /></td>
								</tr>
								<tr valign="top">
									<td align="left">Show Weapon Skills</td>
									<td><input type="checkbox" name="showws" value="1" <?php checked('1', $ffxi_options[showws]); ?> /></td>
								</tr>
								<tr valign="top">
									<td align="left">Show Combat Skills</td>
									<td><input type="checkbox" name="showcom" value="1" <?php checked('1', $ffxi_options[showcom]); ?> /></td>
								</tr>
								<tr valign="top">
									<td align="left">Show Magic Skills</td>
									<td><input type="checkbox" name="showmag" value="1" <?php checked('1', $ffxi_options[showmag]); ?> /></td>
								</tr>
								<tr valign="top">
									<td align="left">Show Missions</td>
									<td><input type="checkbox" name="showmis" value="1" <?php checked('1', $ffxi_options[showmis]); ?> /></td>
								</tr>
							</table>
							<div class="submit"><input type="submit" name="updateopt" value="Update &raquo;" /></div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<div style="width: 175px;">
			<?php 
			if(!$ffxi_options[showpro])  
				echo "<div class='ffxi-sec' style='display: none;'>";
			else
				echo "<div class='ffxi-sec'>";
			?>
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr>
						<td>
							<div class="ffxi-cap">Profile</div>
						</td>
					</tr>
                </table>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        <td class="ffxi-item" width="50%">World</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $world; ?></td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Nation</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $nation; ?></td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Race</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $race; ?></td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Sex</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $sex; ?></td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Rank</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $rank; ?></td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Linkshell</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $ls; ?></td>
                    </tr>
                </table>
            </div>
			<?php 
			if(!$ffxi_options[showbjob])  
				echo "<div class='ffxi-sec' style='display: none;'>";
			else
				echo "<div class='ffxi-sec'>";
			?>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        <td>
                            <div class="ffxi-cap">Basic Jobs</div>
                        </td>
                    </tr>
                </table>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        <td class="ffxi-item" width="50%">Warrior</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $war; ?></td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">White Mage</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $whm; ?></td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Red Mage</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $rdm; ?></td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Monk</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $mnk; ?></td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Black Mage</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $blm; ?></td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Thief</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $thf; ?></td>
                    </tr>
                </table>
            </div>
			<?php 
			if(!$ffxi_options[showajob])  
				echo "<div class='ffxi-sec' style='display: none;'>";
			else
				echo "<div class='ffxi-sec'>";
			?>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        <td>
                            <div class="ffxi-cap">Adv. Jobs</div>
                        </td>
                    </tr>
                </table>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        <td class="ffxi-item" width="50%">Paladin</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($pld != 0)
									echo $pld;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Dark Knight</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($drk != 0)
									echo $drk;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Beastmaster</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($bst != 0)
									echo $bst;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Bard</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($brd != 0)
									echo $brd;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Ranger</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($rng != 0)
									echo $rng;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Summoner</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($smn != 0)
									echo $smn;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Samurai</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($sam != 0)
									echo $sam;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Ninja</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($nin != 0)
									echo $nin;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Dragoon</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($drg != 0)
									echo $drg;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Blue Mage</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($blu != 0)
									echo $blu;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Corsair</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($cor != 0)
									echo $cor;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Puppetmaster</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($pup != 0)
									echo $pup;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Dancer</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($dnc != 0)
									echo $dnc;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ffxi-item" width="50%">Scholar</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%">
							<?php 
								if ($sch != 0)
									echo $sch;
								else
									echo "-";
							?>
                        </td>
                    </tr>
                </table>
            </div>
			<?php 
			if(!$ffxi_options[showcraft])  
				echo "<div class='ffxi-sec' style='display: none;'>";
			else
				echo "<div class='ffxi-sec'>";
			?>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        <td>
                            <div class="ffxi-cap">Craft Skills</div>
                        </td>
                    </tr>
                </table>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                	<tr>
                    	<td class="ffxi-item" width="30%">Alchemy</td>
                        <td width="15%">&nbsp;</td>
                        <td class="ffxi-value" width="50%"><?php echo $alrnk; ?></td>
                        <td class="ffxi-value" width="5%">[<?php echo $allvl; ?>]</td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="30%">Blacksmithing</td>
                        <td width="15%">&nbsp;</td>
                        <td class="ffxi-value" width="50%"><?php echo $bsrnk; ?></td>
                        <td class="ffxi-value" width="5%">[<?php echo $bslvl; ?>]</td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="30%">Bonecraft</td>
                        <td width="15%">&nbsp;</td>
                        <td class="ffxi-value" width="50%"><?php echo $bnrnk; ?></td>
                        <td class="ffxi-value" width="5%">[<?php echo $bnlvl; ?>]</td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="30%">Clothcraft</td>
                        <td width="15%">&nbsp;</td>
                        <td class="ffxi-value" width="50%"><?php echo $clrnk; ?></td>
                        <td class="ffxi-value" width="5%">[<?php echo $cllvl; ?>]</td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="30%">Cooking</td>
                        <td width="15%">&nbsp;</td>
                        <td class="ffxi-value" width="50%"><?php echo $ckrnk; ?></td>
                        <td class="ffxi-value" width="5%">[<?php echo $cklvl; ?>]</td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="30%">Fishing</td>
                        <td width="15%">&nbsp;</td>
                        <td class="ffxi-value" width="50%"><?php echo $fsrnk; ?></td>
                        <td class="ffxi-value" width="5%">[<?php echo $fslvl; ?>]</td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="30%">Goldsmithing</td>
                        <td width="15%">&nbsp;</td>
                        <td class="ffxi-value" width="50%"><?php echo $gsrnk; ?></td>
                        <td class="ffxi-value" width="5%">[<?php echo $gslvl; ?>]</td>
                    </tr>                	<tr>
                    	<td class="ffxi-item" width="30%">Leathercraft</td>
                        <td width="15%">&nbsp;</td>
                        <td class="ffxi-value" width="50%"><?php echo $ltrnk; ?></td>
                        <td class="ffxi-value" width="5%">[<?php echo $ltlvl; ?>]</td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="30%">Woodworking</td>
                        <td width="15%">&nbsp;</td>
                        <td class="ffxi-value" width="50%"><?php echo $wdrnk; ?></td>
                        <td class="ffxi-value" width="5%">[<?php echo $wdlvl; ?>]</td>
                    </tr>
                </table>            
            </div>
			<?php 
			if(!$ffxi_options[showws])  
				echo "<div class='ffxi-sec' style='display: none;'>";
			else
				echo "<div class='ffxi-sec'>";
			?>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        <td>
                            <div class="ffxi-cap">Weapon Skills</div>
                        </td>
                    </tr>
                </table>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                	<tr>
                    	<td class="ffxi-item" width="50%">Archery</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $archws; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Axe</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $axews; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Club</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $clubws; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Dagger</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $dagws; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Great Axe</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $graxews; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Great Katana</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $grkatws; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Great Sword</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $grswdws; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Hand-to-Hand</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $h2hws; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Katana</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $katws; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Marksmanship</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $markws; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Polearm</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $polews; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Scythe</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $scyhws; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Staff</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $staffws; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Sword</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $swdws; ?></td>
                    </tr>
                </table>
            </div>
			<?php 
			if(!$ffxi_options[showcom])  
				echo "<div class='ffxi-sec' style='display: none;'>";
			else
				echo "<div class='ffxi-sec'>";
			?>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        <td>
                            <div class="ffxi-cap">Combat Skills</div>
                        </td>
                    </tr>
                </table>
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
                	<tr>
                    	<td class="ffxi-item" width="50%">Archery</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $arch; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Axe</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $axe; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Club</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $club; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Dagger</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $dagger; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Evasion</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $eva; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Great Axe</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $graxe; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Great Katana</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $grkat; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Great Sword</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $grswd; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Guarding</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $guard; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Hand-to-Hand</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $h2h; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Katana</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $kat; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Marksmanship</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $mark; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Parrying</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $parry; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Polearm</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $pole; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Scythe</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $scythe; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Shield</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $shield; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Staff</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $staff; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Sword</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $sword; ?></td>
                    </tr>
                	<tr>
                    	<td class="ffxi-item" width="50%">Throwing</td>
                        <td width="5%">&nbsp;</td>
                        <td class="ffxi-value" width="45%"><?php echo $throw; ?></td>
                    </tr>
				</table>
			</div>
			<?php 
			if(!$ffxi_options[showmag])  
				echo "<div class='ffxi-sec' style='display: none;'>";
			else
				echo "<div class='ffxi-sec'>";
			?>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        <td>
                            <div class="ffxi-cap">Magic Skills</div>
                        </td>
                    </tr>
                </table>
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr>
						<td class="ffxi-item" width="50%">Dark</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value" width="45%"><?php echo $dark; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">Divine</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value" width="45%"><?php echo $divine; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">Elemental</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value" width="45%"><?php echo $ele; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">Enfeebling</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value" width="45%"><?php echo $enf; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">Enhancing</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value" width="45%"><?php echo $enh; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">Healing</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value" width="45%"><?php echo $heal; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">Ninjutsu</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value" width="45%"><?php echo $ninj; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">Summoning</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value" width="45%"><?php echo $summ; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">Blue Magic</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value" width="45%"><?php echo $blue; ?></td>
					</tr>
				</table>
			</div>
			<?php 
			if(!$ffxi_options[showmis])  
				echo "<div class='ffxi-sec' style='display: none;'>";
			else
				echo "<div class='ffxi-sec'>";
			?>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                    <tr>
                        <td>
                            <div class="ffxi-cap">Missions</div>
                        </td>
                    </tr>
                </table>
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr>
						<td class="ffxi-item" width="50%">Bastok</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value"><?php echo $bas; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">Windurst</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value"><?php echo $wind; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">San d&#039;Oria</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value"><?php echo $sand; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">RoZ</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value"><?php echo $zil; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">CoP</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value"><?php echo $cop; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">ToAU</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value"><?php echo $toau; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">WotG</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value"><?php echo $wog; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">ACP</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value"><?php echo $crys; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">AMK</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value"><?php echo $evil; ?></td>
					</tr>
					<tr>
						<td class="ffxi-item" width="50%">ASA</td>
						<td width="5%">&nbsp;</td>
						<td class="ffxi-value"><?php echo $shan; ?></td>
					</tr>
				</table>
			</div>
        </div>
    </div>
<?php
}
?>
