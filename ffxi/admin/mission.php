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

function ffxi_mission_stats() {
	global $wpdb;
	
	# Get database info
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
	
	if ( isset($_POST['updateopt']) ) {
		check_admin_referer('ffxi_mission_stats');
		
		$bas = attribute_escape($_POST[bastok]);
		$wind = attribute_escape($_POST[windy]);
		$sand = attribute_escape($_POST[sandy]);
		$zil = attribute_escape($_POST[zilart]);
		$cop = attribute_escape($_POST[promathia]);
		$toau = attribute_escape($_POST[ahturhgan]);
		$wog = attribute_escape($_POST[altana]);
		$crys = attribute_escape($_POST[crystalline]);
		$evil = attribute_escape($_POST['evilsmalldose']);
		
		$result = $wpdb->query("UPDATE $wpdb->ffxistats_mission SET bastok='$bas', windy='$wind', sandy='$sand', zilart='$zil', promathia='$cop', ahturhgan='$toau', altana='$wog', crystalline='$crys', evilsmalldose='$evil'");

		$messagetext = '<font color="green">Missions updated successfully.</font>';
	}
	if (!empty($messagetext)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$messagetext.'</p></div>'; }
	?>
    <div class="wrap">
        <div id="missioninfo">
            <h2>Missions</h2>
            <form name="missions" method="post">
                <?php wp_nonce_field('ffxi_mission_stats'); ?>
                <fieldset class="options">
                    <table class="optiontable editform">
                        <tr valign="top">
                            <th align="left">Bastok</th>
                            <td><input type="text" size="45" maxlength="45" name="bastok" value="<?php echo $bas; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Windurst</th>
                            <td><input type="text" size="45" maxlength="45" name="windy" value="<?php echo $wind; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">San d&#039;Oria</th>
                            <td><input type="text" size="45" maxlength="45" name="sandy" value="<?php echo $sand; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Rise of the Zilart</th>
                            <td><input type="text" size="45" maxlength="45" name="zilart" value="<?php echo $zil; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Chains of Promathia</th>
                            <td><input type="text" size="45" maxlength="45" name="promathia" value="<?php echo $cop; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Aht Urhgan</th>
                            <td><input type="text" size="45" maxlength="45" name="ahturhgan" value="<?php echo $toau; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Wings of the Goddess</th>
                            <td><input type="text" size="45" maxlength="45" name="altana" value="<?php echo $wog; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Crystalline Prophecy</th>
                            <td><input type="text" size="45" maxlength="45" name="crystalline" value="<?php echo $crys; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Moogle Kupo d'Etat</th>
                            <td><input type="text" size="45" maxlength="45" name="evilsmalldose" value="<?php echo $evil; ?>" /></td>
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