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

function ffxi_ws_stats() {
	global $wpdb;
	
	# Get database info
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
	
	if ( isset($_POST['updateopt']) ) {
		check_admin_referer('ffxi_ws_stats');
		
		$archws = attribute_escape($_POST[arch_ws]);
		$axews = attribute_escape($_POST[axe_ws]);
		$clubws = attribute_escape($_POST[club_ws]);
		$dagws = attribute_escape($_POST[dagger_ws]);
		$graxews = attribute_escape($_POST[graxe_ws]);
		$grkatws = attribute_escape($_POST[grkat_ws]);
		$h2hws = attribute_escape($_POST[h2h_ws]);
		$katws = attribute_escape($_POST[kat_ws]);
		$markws = attribute_escape($_POST[mark_ws]);
		$polews = attribute_escape($_POST[pole_ws]);
		$scyws = attribute_escape($_POST[scythe_ws]);
		$staffws = attribute_escape($_POST[staff_ws]);
		$swdws = attribute_escape($_POST[swd_ws]);
		
		$result = $wpdb->query("UPDATE $wpdb->ffxistats_weapon SET arch_ws='$archws', axe_ws='$axews', club_ws='$clubws', dagger_ws='$dagws', graxe_ws='$graxews', grkat_ws='$grkatws', h2h_ws='$h2hws', kat_ws='$katws', mark_ws='$markws', pole_ws='$polews', scythe_ws='$scyws', staff_ws='$staffws', swd_ws='$swdws'");

		$messagetext = '<font color="green">Weapon skills updated successfully.</font>';
	}
	if (!empty($messagetext)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$messagetext.'</p></div>'; }
	?>
    <div class="wrap">
        <div id="wsinfo">
            <h2>Weapon skills</h2>
            <form name="wslevels" method="post">
                <?php wp_nonce_field('ffxi_ws_stats'); ?>
                <fieldset class="options">
                    <table class="optiontable editform">
                        <tr valign="top">
                            <th align="left">Archery</th>
                            <td><input type="text" size="45" maxlength="45" name="arch_ws" value="<?php echo $archws; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Axe</th>
                            <td><input type="text" size="45" maxlength="45" name="axe_ws" value="<?php echo $axews; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Club</th>
                            <td><input type="text" size="45" maxlength="45" name="club_ws" value="<?php echo $clubws; ?>" /></td>
                        </tr>					
                        <tr valign="top">
                            <th align="left">Dagger</th>
                            <td><input type="text" size="45" maxlength="45" name="dagger_ws" value="<?php echo $dagws; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Great Axe</th>
                            <td><input type="text" size="45" maxlength="45" name="graxe_ws" value="<?php echo $graxews; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Great Katana</th>
                            <td><input type="text" size="45" maxlength="45" name="grkat_ws" value="<?php echo $grkatws; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Great Sword</th>
                            <td><input type="text" size="45" maxlength="45" name="grswd_ws" value="<?php echo $grswdws; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Hand-to-Hand</th>
                            <td><input type="text" size="45" maxlength="45" name="h2h_ws" value="<?php echo $h2hws; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Katana</th>
                            <td><input type="text" size="45" maxlength="45" name="kat_ws" value="<?php echo $katws; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Marksmanship</th>
                            <td><input type="text" size="45" maxlength="45" name="mark_ws" value="<?php echo $markws; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Polearm</th>
                            <td><input type="text" size="45" maxlength="45" name="pole_ws" value="<?php echo $polews; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Scythe</th>
                            <td><input type="text" size="45" maxlength="45" name="scythe_ws" value="<?php echo $scyws; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Staff</th>
                            <td><input type="text" size="45" maxlength="45" name="staff_ws" value="<?php echo $staffws; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Sword</th>
                            <td><input type="text" size="45" maxlength="45" name="swd_ws" value="<?php echo $swdws; ?>" /></td>
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