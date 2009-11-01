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

function ffxi_combat_stats() {
	global $wpdb;
	
	# Get database info
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
	
	if ( isset($_POST['updateopt']) ) {
		check_admin_referer('ffxi_combat_stats');
		
		$arch = attribute_escape($_POST[arch_lvl]);
		$axe = attribute_escape($_POST[axe_lvl]);
		$club = attribute_escape($_POST[club_lvl]);
		$dagger = attribute_escape($_POST[dagger_lvl]);
		$eva = attribute_escape($_POST[evasion_lvl]);
		$graxe = attribute_escape($_POST[graxe_lvl]);
		$grkat = attribute_escape($_POST[grkat_lvl]);
		$grswd = attribute_escape($_POST[grswd_lvl]);
		$guard = attribute_escape($_POST[guard_lvl]);
		$h2h = attribute_escape($_POST[h2h_lvl]);
		$kat = attribute_escape($_POST[kat_lvl]);
		$mark = attribute_escape($_POST[mark_lvl]);
		$parry = attribute_escape($_POST[parry_lvl]);
		$pole = attribute_escape($_POST[pole_lvl]);
		$scythe = attribute_escape($_POST[scythe_lvl]);
		$shield = attribute_escape($_POST[shield_lvl]);
		$staff = attribute_escape($_POST[staff_lvl]);
		$sword = attribute_escape($_POST[sword_lvl]);
		$throw = attribute_escape($_POST[throw_lvl]);
		
		$result = $wpdb->query("UPDATE $wpdb->ffxistats_combat SET arch_lvl='$arch', axe_lvl='$axe', club_lvl='$club', dagger_lvl='$dagger', evasion_lvl='$eva', graxe_lvl='$graxe', grkat_lvl='$grkat', grswd_lvl='$grswd', guard_lvl='$guard', h2h_lvl='$h2h', kat_lvl='$kat', mark_lvl='$mark', parry_lvl='$parry', pole_lvl='$pole', scythe_lvl='$scythe', shield_lvl='$shield', staff_lvl='$staff', sword_lvl='$sword', throw_lvl='$throw'");
		
		$messagetext = '<font color="green">Combat stats updated successfully.</font>';
	}
	if (!empty($messagetext)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$messagetext.'</p></div>'; }
	?>
    <div class="wrap">
        <div id="cominfo">
            <h2>Combat Stats</h2>
            <form name="comlevels" method="post">
                <?php wp_nonce_field('ffxi_combat_stats'); ?>
                <fieldset class="options">
                    <table class="optiontable editform">
                        <tr valign="top">
                            <th align="left">Archery</th>
                            <td><input type="text" size="3" maxlength="3" name="arch_lvl" value="<?php echo $arch; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Axe</th>
                            <td><input type="text" size="3" maxlength="3" name="axe_lvl" value="<?php echo $axe; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Club</th>
                            <td><input type="text" size="3" maxlength="3" name="club_lvl" value="<?php echo $club; ?>" /></td>
                        </tr>					
                        <tr valign="top">
                            <th align="left">Dagger</th>
                            <td><input type="text" size="3" maxlength="3" name="dagger_lvl" value="<?php echo $dagger; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Evasion</th>
                            <td><input type="text" size="3" maxlength="3" name="evasion_lvl" value="<?php echo $eva; ?>" /></td>
                        </tr>					
                        <tr valign="top">
                            <th align="left">Great Axe</th>
                            <td><input type="text" size="3" maxlength="3" name="graxe_lvl" value="<?php echo $graxe; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Great Katana</th>
                            <td><input type="text" size="3" maxlength="3" name="grkat_lvl" value="<?php echo $grkat; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Great Sword</th>
                            <td><input type="text" size="3" maxlength="3" name="grswd_lvl" value="<?php echo $grswd; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Guard</th>
                            <td><input type="text" size="3" maxlength="3" name="guard_lvl" value="<?php echo $guard; ?>" /></td>
                        </tr>					
                        <tr valign="top">
                            <th align="left">Hand-to-Hand</th>
                            <td><input type="text" size="3" maxlength="3" name="h2h_lvl" value="<?php echo $h2h; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Katana</th>
                            <td><input type="text" size="3" maxlength="3" name="kat_lvl" value="<?php echo $kat; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Marksmanship</th>
                            <td><input type="text" size="3" maxlength="3" name="mark_lvl" value="<?php echo $mark; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Parrying</th>
                            <td><input type="text" size="3" maxlength="3" name="parry_lvl" value="<?php echo $parry; ?>" /></td>
                        </tr>					
                        <tr valign="top">
                            <th align="left">Polearm</th>
                            <td><input type="text" size="3" maxlength="3" name="pole_lvl" value="<?php echo $pole; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Scythe</th>
                            <td><input type="text" size="3" maxlength="3" name="scythe_lvl" value="<?php echo $scythe; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Shield</th>
                            <td><input type="text" size="3" maxlength="3" name="shield_lvl" value="<?php echo $shield; ?>" /></td>
                        </tr>					
                        <tr valign="top">
                            <th align="left">Staff</th>
                            <td><input type="text" size="3" maxlength="3" name="staff_lvl" value="<?php echo $staff; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Sword</th>
                            <td><input type="text" size="3" maxlength="3" name="sword_lvl" value="<?php echo $sword; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Throwing</th>
                            <td><input type="text" size="3" maxlength="3" name="throw_lvl" value="<?php echo $throw; ?>" /></td>
                        </tr>																																																																																																									
                    </table>
                    <div class="submit">
                        <input type="submit" name="updateopt" value="Update Stats &raquo;" />
                    </div>
                </fieldset>
            </form>
        </div>
	</div>
<?php
}
?>