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

function ffxi_profile() {
	global $wpdb;

	# Get database info
	$profilelist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats WHERE id=0");
	foreach($profilelist as $profile) {
		$chname = $profile->chname;
		$server = $profile->server;
		$nation = $profile->nation;
		$race = $profile->race;
		$sex = $profile->sex;
		$rank = $profile->rank;
		$ls = $profile->linkshell;
	}

	if ( isset($_POST['updateopt']) ) {
		check_admin_referer('ffxi_profile');

		$chname = attribute_escape($_POST[chname]);
		$server = attribute_escape($_POST[server]);
		$nation = attribute_escape($_POST[nation]);
		$race = attribute_escape($_POST[race]);
		$sex = attribute_escape($_POST[sex]);
		$rank = attribute_escape($_POST[rank]);
		$ls = attribute_escape($_POST[linkshell]);

		$result = $wpdb->query("UPDATE $wpdb->ffxistats SET chname='$chname', server='$server', nation='$nation', race='$race', sex='$sex', rank='$rank', linkshell='$ls'");

		$messagetext = '<font color="green">Profile updated successfully.</font>';
	}
	if (!empty($messagetext)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$messagetext.'</p></div>'; }
	?>
    <div class="wrap">
        <div id="profileinfo">
            <h2>Character Profile</h2>
            <form name="cprofile" method="post">
                <?php wp_nonce_field('ffxi_profile'); ?>
                <fieldset class="options">
                    <table class="optiontable editform">
                        <tr valign="top">
                            <th align="left">Character Name</th>
                            <td><input type="text" size="35" name="chname" value="<?php echo $chname; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">World</th>
                            <td>
                                <select name="server">
                                    <option>Select World</option>
                                    <option value="Bahamut" <?php ffxi_input_selected('Bahamut', $server); ?>>Bahamut</option>
                                    <option value="Shiva" <?php ffxi_input_selected('Shiva', $server); ?>>Shiva</option>
                                    <option value="Titan" <?php ffxi_input_selected('Titan', $server); ?>>Titan</option>
                                    <option value="Ramuh" <?php ffxi_input_selected('Ramuh', $server); ?>>Ramuh</option>
                                    <option value="Phoenix" <?php ffxi_input_selected('Phoenix', $server); ?>>Phoenix</option>
                                    <option value="Carbuncle" <?php ffxi_input_selected('Carbuncle', $server); ?>>Carbuncle</option>
                                    <option value="Fenrir" <?php ffxi_input_selected('Fenrir', $server); ?>>Fenrir</option>
                                    <option value="Sylph" <?php ffxi_input_selected('Sylph', $server); ?>>Sylph</option>
                                    <option value="Valefor" <?php ffxi_input_selected('Valefor', $server); ?>>Valefor</option>
                                    <option value="Alexander" <?php ffxi_input_selected('Alexander', $server); ?>>Alexander</option>
                                    <option value="Leviathan" <?php ffxi_input_selected('Leviathan', $server); ?>>Leviathan</option>
                                    <option value="Odin" <?php ffxi_input_selected('Odin', $server); ?>>Odin</option>
                                    <option value="Ifrit" <?php ffxi_input_selected('Ifrit', $server); ?>>Ifrit</option>
                                    <option value="Diabolos" <?php ffxi_input_selected('Diabolos', $server); ?>>Diabolos</option>
                                    <option value="Caitsith" <?php ffxi_input_selected('Caitsith', $server); ?>>Caitsith</option>
                                    <option value="Quetzalcoatl" <?php ffxi_input_selected('Quetzalcoatl', $server); ?>>Quetzalcoatl</option>
                                    <option value="Siren" <?php ffxi_input_selected('Siren', $server); ?>>Siren</option>
                                    <option value="Unicorn" <?php ffxi_input_selected('Unicorn', $server); ?>>Unicorn</option>
                                    <option value="Gilgamesh" <?php ffxi_input_selected('Gilgamesh', $server); ?>>Gilgamesh</option>
                                    <option value="Ragnarok" <?php ffxi_input_selected('Ragnarok', $server); ?>>Ragnarok</option>
                                    <option value="Cerberus" <?php ffxi_input_selected('Cerberus', $server); ?>>Cerberus</option>
                                    <option value="Bismarck" <?php ffxi_input_selected('Bismarck', $server); ?>>Bismarck</option>
                                    <option value="Lakshmi" <?php ffxi_input_selected('Lakshmi', $server); ?>>Lakshmi</option>
                                    <option value="Asura" <?php ffxi_input_selected('Asura', $server); ?>>Asura</option>
                                </select>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Nation</th>
                          <td>
                            <select name="nation">
                                <option>Select Nation</option>
                                <option value="Bastok" <?php ffxi_input_selected('Bastok', $nation); ?>>Bastok</option>
                                <option value="San d&#039;Oria" <?php ffxi_input_selected('San d&#039;Oria', $nation); ?>>San d&#039;Oria</option>
                                <option value="Windurst" <?php ffxi_input_selected('Windurst', $nation); ?>>Windurst</option>
                            </select>
                          </td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Race</th>
                            <td>
                                <select name="race">
                                    <option>Select Race</option>
                                    <option value="Hume" <?php ffxi_input_selected('Hume', $race); ?>>Hume</option>
                                    <option value="Elvaan" <?php ffxi_input_selected('Elvaan', $race); ?>>Elvaan</option>
                                    <option value="Tarutaru" <?php ffxi_input_selected('Tarutaru', $race); ?>>Tarutaru</option>
                                    <option value="Galka" <?php ffxi_input_selected('Galka', $race); ?>>Galka</option>
                                    <option value="Mithra" <?php ffxi_input_selected('Mithra', $race); ?>>Mithra</option>
                                </select>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Sex</th>
                            <td>
                                <label><input type="radio" name="sex" value="Male" <?php ffxi_input_checked('Male', $sex); ?> />Male</label>
                                <label><input type="radio" name="sex" value="Female" <?php ffxi_input_checked('Female', $sex); ?> />Female</label>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Rank</th>
                            <td><input type="text" name="rank" size="3" maxlength="3" value="<?php echo $rank; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Linkshell</th>
                            <td><input type="text" name="linkshell" size="25" maxlength="25" value="<?php echo $ls; ?>" /></td>
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

// Function to see if options are selected in <select></select> fields
function ffxi_input_selected( $fieldoption, $value) {
	if ( $fieldoption == $value) {
		echo 'selected="selected"';
	}
}

// Function to see if options should be checked
function ffxi_input_checked( $option, $value ) {
	if ($option == $value) {
		echo 'checked="checked"';
	}
}
?>