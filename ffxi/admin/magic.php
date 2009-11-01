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

function ffxi_magic_stats() {
	global $wpdb;
	
	# Get database info
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
	
	if ( isset($_POST['updateopt']) ) {
		check_admin_referer('ffxi_magic_stats');
		
		$dark = attribute_escape($_POST[dark]);
		$divine = attribute_escape($_POST[divine]);
		$ele = attribute_escape($_POST[elemental]);
		$enf = attribute_escape($_POST[enfeebling]);
		$enh = attribute_escape($_POST[enhancing]);
		$heal = attribute_escape($_POST[healing]);
		$ninj = attribute_escape($_POST[ninjutsu]);
		$summ = attribute_escape($_POST[summoning]);
		$blue = attribute_escape($_POST[blue]);
		
		$result = $wpdb->query("UPDATE $wpdb->ffxistats_magic SET dark='$dark', divine='$divine', elemental='$ele', enfeebling='$enf', enhancing='$enh', healing='$heal', ninjutsu='$ninj', summoning='$summ', blue='$blue'");
		
		$messagetext = '<font color="green">Magic stats updated successfully.</font>';
	}
	if (!empty($messagetext)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$messagetext.'</p></div>'; }
	?>
    <div class="wrap">
        <div id="maginfo">
            <h2>Magic Levels</h2>
            <form name="maglevels" method="post">
                <?php wp_nonce_field('ffxi_magic_stats'); ?>
                <fieldset class="options">
                    <table class="optiontable editform">
                        <tr valign="top">
                            <th align="left">Dark</th>
                            <td><input type="text" size="3" maxlength="3" name="dark" value="<?php echo $dark; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Divine</th>
                            <td><input type="text" size="3" maxlength="3" name="divine" value="<?php echo $divine; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Elemental</th>
                            <td><input type="text" size="3" maxlength="3" name="elemental" value="<?php echo $ele; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Enfeebling</th>
                            <td><input type="text" size="3" maxlength="3" name="enfeebling" value="<?php echo $enf; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Healing</th>
                            <td><input type="text" size="3" maxlength="3" name="healing" value="<?php echo $heal; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Ninjutsu</th>
                            <td><input type="text" size="3" maxlength="3" name="ninjutsu" value="<?php echo $ninj; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Summoning</th>
                            <td><input type="text" size="3" maxlength="3" name="summoning" value="<?php echo $summ; ?>" /></td>
                        </tr>
						<tr valign="top">
							<th align="left">Blue Magic</th>
							<td><input type="text" size="3" maxlength="3" name="blue" value="<?php echo $blue; ?>" /></td>
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