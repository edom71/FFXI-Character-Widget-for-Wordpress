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
		$world = $profile->server;
		$nation = $profile->nation;
		$race = $profile->race;
		$sex = $profile->sex;
		$rank = $profile->rank;
		$ls = $profile->linkshell;
	}
	
	if ( isset($_POST['updateopt']) ) {
		check_admin_referer('ffxi_profile');
		
		$chname = attribute_escape($_POST[chname]);
		$world = attribute_escape($_POST[server]);
		$nation = attribute_escape($_POST[nation]);
		$race = attribute_escape($_POST[race]);
		$sex = attribute_escape($_POST[sex]);
		$rank = attribute_escape($_POST[rank]);
		$ls = attribute_escape($_POST[linkshell]);
		
		$result = $wpdb->query("UPDATE $wpdb->ffxistats SET chname='$chname', server='$world', nation='$nation', race='$race', sex='$sex', rank='$rank', linkshell='$ls'");

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
                                    <option value="Bahamut" <?php selected('Bahamut', $world); ?>>Bahamut</option>
                                    <option value="Shiva" <?php selected('Shiva', $world); ?>>Shiva</option>
                                    <option value="Titan" <?php selected('Titan', $world); ?>>Titan</option>
                                    <option value="Ramuh" <?php selected('Ramuh', $world); ?>>Ramuh</option>
                                    <option value="Phoenix" <?php selected('Phoenix', $world); ?>>Phoenix</option>
                                    <option value="Carbuncle" <?php selected('Carbuncle', $world); ?>>Carbuncle</option>
                                    <option value="Fenrir" <?php selected('Fenrir', $world); ?>>Fenrir</option>
                                    <option value="Sylph" <?php selected('Sylph', $world); ?>>Sylph</option>
                                    <option value="Valefor" <?php selected('Valefor', $world); ?>>Valefor</option>
                                    <option value="Alexander" <?php selected('Alexander', $world); ?>>Alexander</option>
                                    <option value="Leviathan" <?php selected('Leviathan', $world); ?>>Leviathan</option>
                                    <option value="Odin" <?php selected('Odin', $world); ?>>Odin</option>
                                    <option value="Ifrit" <?php selected('Ifrit', $world); ?>>Ifrit</option>
                                    <option value="Diabolos" <?php selected('Diabolos', $world); ?>>Diabolos</option>
                                    <option value="Caitsith" <?php selected('Caitsith', $world); ?>>Caitsith</option>
                                    <option value="Quetzalcoatl" <?php selected('Quetzalcoatl', $world); ?>>Quetzalcoatl</option>
                                    <option value="Siren" <?php selected('Siren', $world); ?>>Siren</option>
                                    <option value="Unicorn" <?php selected('Unicorn', $world); ?>>Unicorn</option>
                                    <option value="Gilgamesh" <?php selected('Gilgamesh', $world); ?>>Gilgamesh</option>
                                    <option value="Ragnarok" <?php selected('Ragnarok', $world); ?>>Ragnarok</option>                                <option value="Pandemonium" <?php selected('Pandemonium', $world); ?>>Pandemonium</option>
                                    <option value="Garuda" <?php selected('Garuda', $world); ?>>Garuda</option>
                                    <option value="Cerberus" <?php selected('Cerberus', $world); ?>>Cerberus</option>
                                    <option value="Kujata" <?php selected('Kujata', $world); ?>>Kujata</option>
                                    <option value="Bismarck" <?php selected('Bismarck', $world); ?>>Bismarck</option>
                                    <option value="Seraph" <?php selected('Seraph', $world); ?>>Seraph</option>
                                    <option value="Lakshmi" <?php selected('Lakshmi', $world); ?>>Lakshmi</option>
                                    <option value="Asura" <?php selected('Asura', $world); ?>>Asura</option>
                                    <option value="Midgardsormr" <?php selected('Midgardsormr', $world); ?>>Midgardsormr</option>
                                    <option value="Fairy" <?php selected('Fairy', $world); ?>>Fairy</option>
                                    <option value="Remora" <?php selected('Remora', $world); ?>>Remora</option>
                                    <option value="Hades" <?php selected('Hades', $world); ?>>Hades</option>
                                </select>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Nation</th>
                          <td>
                            <select name="nation">
                                <option>Select Nation</option>
                                <option value="Bastok" <?php selected('Bastok', $nation); ?>>Bastok</option>
                                <option value="San d&#039;Oria" <?php selected('San d&#039;Oria', $nation); ?>>San d&#039;Oria</option>
                                <option value="Windurst" <?php selected('Windurst', $nation); ?>>Windurst</option>
                            </select>
                          </td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Race</th>
                            <td>
                                <select name="race">
                                    <option>Select Race</option>
                                    <option value="Hume" <?php selected('Hume', $race); ?>>Hume</option>
                                    <option value="Elvaan" <?php selected('Elvaan', $race); ?>>Elvaan</option>
                                    <option value="Tarutaru" <?php selected('Tarutaru', $race); ?>>Tarutaru</option>
                                    <option value="Galka" <?php selected('Galka', $race); ?>>Galka</option>
                                    <option value="Mithra" <?php selected('Mithra', $race); ?>>Mithra</option>
                                </select>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Sex</th>
                            <td>
                                <label><input type="radio" name="sex" value="Male" <?php checked('Male', $sex); ?> />Male</label>
                                <label><input type="radio" name="sex" value="Female" <?php checked('Female', $sex); ?> />Female</label>							
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

function ffxi_input_selected( $selected, $current) {
	if ( $selected == $current)
		return ' selected="selected"';
}

function ffxi_input_checked( $checked, $current) {
	if ( $checked == $current)
		return ' checked="checked"';
}
?>