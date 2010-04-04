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

function ffxi_crafting_stats() {
	global $wpdb;

	# Get database info
	$craftlist = $wpdb->get_results("SELECT * FROM $wpdb->ffxistats_craft WHERE id=0");
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
		$synrnk = $craft->syn_rnk;
		$synlvl = $craft->syn_lvl;
	}

	if ( isset($_POST['updateopt']) ) {
		check_admin_referer('ffxi_crafting_stats');

		$alrnk = attribute_escape($_POST[alch_rnk]);
		$allvl = attribute_escape($_POST[alch_lvl]);
		$bsrnk = attribute_escape($_POST[bsmith_rnk]);
		$bslvl = attribute_escape($_POST[bsmith_lvl]);
		$bnrnk = attribute_escape($_POST[bone_rnk]);
		$bnlvl = attribute_escape($_POST[bone_lvl]);
		$clrnk = attribute_escape($_POST[cloth_rnk]);
		$cllvl = attribute_escape($_POST[cloth_lvl]);
		$ckrnk = attribute_escape($_POST[cook_rnk]);
		$cklvl = attribute_escape($_POST[cook_lvl]);
		$fsrnk = attribute_escape($_POST[fish_rnk]);
		$fslvl = attribute_escape($_POST[fish_lvl]);
		$gsrnk = attribute_escape($_POST[gsmith_rnk]);
		$gslvl = attribute_escape($_POST[gsmith_lvl]);
		$ltrnk = attribute_escape($_POST[lthr_rnk]);
		$ltlvl = attribute_escape($_POST[lthr_lvl]);
		$wdrnk = attribute_escape($_POST[wood_rnk]);
		$wdlvl = attribute_escape($_POST[wood_lvl]);
		$synrnk = attribute_escape($_POST[syn_rnk]);
		$synlvl = attribute_escape($_POST[syn_lvl]);

		$result = $wpdb->query("UPDATE $wpdb->ffxistats_craft SET alch_lvl='$allvl', alch_rnk='$alrnk', bsmith_rnk='$bsrnk', bsmith_lvl='$bslvl', bone_rnk='$bnrnk', bone_lvl='$bnlvl', cloth_rnk='$clrnk', cloth_lvl='$cllvl', cook_rnk='$ckrnk', cook_lvl='$cklvl', fish_rnk='$fsrnk', fish_lvl='$fslvl', gsmith_rnk='$gsrnk', gsmith_lvl='$gslvl', lthr_rnk='$ltrnk', lthr_lvl='$ltlvl', wood_rnk='$wdrnk', wood_lvl='$wdlvl', syn_rnk='$synrnk', syn_lvl='$synlvl'");

		$messagetext = '<font color="green">Crafting updated successfully.</font>';
	}
	if (!empty($messagetext)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$messagetext.'</p></div>'; }
	?>
    <div class="wrap">
        <div id="craftinfo">
            <h2>Crafting Levels</h2>
            <form name="cralevels" method="post">
                <?php wp_nonce_field('ffxi_crafting_stats'); ?>
                <fieldset class="options">
                    <table class="optiontable editform">
                        <tr valign="top">
                            <th align="left">Alchemy</th>
                            <td>
                                <select name="alch_rnk">
                                    <option>Select Rank</option>
                                    <option value="Amateur" <?php selected('Amateur', $alrnk); ?>>Amateur</option>
                                    <option value="Recruit" <?php selected('Recruit', $alrnk); ?>>Recruit</option>
                                    <option value="Initiate" <?php selected('Initiate', $alrnk); ?>>Initiate</option>
                                    <option value="Novice" <?php selected('Novice', $alrnk); ?>>Novice</option>
                                    <option value="Apprentice" <?php selected('Apprentice', $alrnk); ?>>Apprentice</option>
                                    <option value="Journeyman" <?php selected('Journeyman', $alrnk); ?>>Journeyman</option>
                                    <option value="Craftsman" <?php selected('Craftsman', $alrnk); ?>>Craftsman</option>
                                    <option value="Artisan" <?php selected('Artisan', $alrnk); ?>>Artisan</option>
                                    <option value="Adept" <?php selected('Adept', $alrnk); ?>>Adept</option>
                                    <option value="Veteran" <?php selected('Veteran', $alrnk); ?>>Veteran</option>
                                </select>
                            </td>
                            <td><input type="text" size="3" maxlength="3" name="alch_lvl" value="<?php echo $allvl; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Blacksmithing</th>
                            <td>
                                <select name="bsmith_rnk">
                                    <option>Select Rank</option>
                                    <option value="Amateur" <?php selected('Amateur', $bsrnk); ?>>Amateur</option>
                                    <option value="Recruit" <?php selected('Recruit', $bsrnk); ?>>Recruit</option>
                                    <option value="Initiate" <?php selected('Initiate', $bsrnk); ?>>Initiate</option>
                                    <option value="Novice" <?php selected('Novice', $bsrnk); ?>>Novice</option>
                                    <option value="Apprentice" <?php selected('Apprentice', $bsrnk); ?>>Apprentice</option>
                                    <option value="Journeyman" <?php selected('Journeyman', $bsrnk); ?>>Journeyman</option>
                                    <option value="Craftsman" <?php selected('Craftsman', $bsrnk); ?>>Craftsman</option>
                                    <option value="Artisan" <?php selected('Artisan', $bsrnk); ?>>Artisan</option>
                                    <option value="Adept" <?php selected('Adept', $bsrnk); ?>>Adept</option>
                                    <option value="Veteran" <?php selected('Veteran', $bsrnk); ?>>Veteran</option>
                                </select>
                            </td>
                            <td><input type="text" size="3" maxlength="3" name="bsmith_lvl" value="<?php echo $bslvl; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Bonecraft</th>
                            <td>
                                <select name="bone_rnk">
                                    <option>Select Rank</option>
                                    <option value="Amateur" <?php selected('Amateur', $bnrnk); ?>>Amateur</option>
                                    <option value="Recruit" <?php selected('Recruit', $bnrnk); ?>>Recruit</option>
                                    <option value="Initiate" <?php selected('Initiate', $bnrnk); ?>>Initiate</option>
                                    <option value="Novice" <?php selected('Novice', $bnrnk); ?>>Novice</option>
                                    <option value="Apprentice" <?php selected('Apprentice', $bnrnk); ?>>Apprentice</option>
                                    <option value="Journeyman" <?php selected('Journeyman', $bnrnk); ?>>Journeyman</option>
                                    <option value="Craftsman" <?php selected('Craftsman', $bnrnk); ?>>Craftsman</option>
                                    <option value="Artisan" <?php selected('Artisan', $bnrnk); ?>>Artisan</option>
                                    <option value="Adept" <?php selected('Adept', $bnrnk); ?>>Adept</option>
                                    <option value="Veteran" <?php selected('Veteran', $bnrnk); ?>>Veteran</option>
                                </select>
                            </td>
                            <td><input type="text" size="3" maxlength="3" name="bone_lvl" value="<?php echo $bnlvl; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Clothcraft</th>
                            <td>
                                <select name="cloth_rnk">
                                    <option>Select Rank</option>
                                    <option value="Amateur" <?php selected('Amateur', $clrnk); ?>>Amateur</option>
                                    <option value="Recruit" <?php selected('Recruit', $clrnk); ?>>Recruit</option>
                                    <option value="Initiate" <?php selected('Initiate', $clrnk); ?>>Initiate</option>
                                    <option value="Novice" <?php selected('Novice', $clrnk); ?>>Novice</option>
                                    <option value="Apprentice" <?php selected('Apprentice', $clrnk); ?>>Apprentice</option>
                                    <option value="Journeyman" <?php selected('Journeyman', $clrnk); ?>>Journeyman</option>
                                    <option value="Craftsman" <?php selected('Craftsman', $clrnk); ?>>Craftsman</option>
                                    <option value="Artisan" <?php selected('Artisan', $clrnk); ?>>Artisan</option>
                                    <option value="Adept" <?php selected('Adept', $clrnk); ?>>Adept</option>
                                    <option value="Veteran" <?php selected('Veteran', $clrnk); ?>>Veteran</option>
                                </select>
                            </td>
                            <td><input type="text" size="3" maxlength="3" name="cloth_lvl" value="<?php echo $cllvl; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Cooking</th>
                            <td>
                                <select name="cook_rnk">
                                    <option>Select Rank</option>
                                    <option value="Amateur" <?php selected('Amateur', $ckrnk); ?>>Amateur</option>
                                    <option value="Recruit" <?php selected('Recruit', $ckrnk); ?>>Recruit</option>
                                    <option value="Initiate" <?php selected('Initiate', $ckrnk); ?>>Initiate</option>
                                    <option value="Novice" <?php selected('Novice', $ckrnk); ?>>Novice</option>
                                    <option value="Apprentice" <?php selected('Apprentice', $ckrnk); ?>>Apprentice</option>
                                    <option value="Journeyman" <?php selected('Journeyman', $ckrnk); ?>>Journeyman</option>
                                    <option value="Craftsman" <?php selected('Craftsman', $ckrnk); ?>>Craftsman</option>
                                    <option value="Artisan" <?php selected('Artisan', $ckrnk); ?>>Artisan</option>
                                    <option value="Adept" <?php selected('Adept', $ckrnk); ?>>Adept</option>
                                    <option value="Veteran" <?php selected('Veteran', $ckrnk); ?>>Veteran</option>
                                </select>
                            </td>
                            <td><input type="text" size="3" maxlength="3" name="cook_lvl" value="<?php echo $cklvl; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Fishing</th>
                            <td>
                                <select name="fish_rnk">
                                    <option>Select Rank</option>
                                    <option value="Amateur" <?php selected('Amateur', $fsrnk); ?>>Amateur</option>
                                    <option value="Recruit" <?php selected('Recruit', $fsrnk); ?>>Recruit</option>
                                    <option value="Initiate" <?php selected('Initiate', $fsrnk); ?>>Initiate</option>
                                    <option value="Novice" <?php selected('Novice', $fsrnk); ?>>Novice</option>
                                    <option value="Apprentice" <?php selected('Apprentice', $fsrnk); ?>>Apprentice</option>
                                    <option value="Journeyman" <?php selected('Journeyman', $fsrnk); ?>>Journeyman</option>
                                    <option value="Craftsman" <?php selected('Craftsman', $fsrnk); ?>>Craftsman</option>
                                    <option value="Artisan" <?php selected('Artisan', $fsrnk); ?>>Artisan</option>
                                    <option value="Adept" <?php selected('Adept', $fsrnk); ?>>Adept</option>
                                    <option value="Veteran" <?php selected('Veteran', $fsrnk); ?>>Veteran</option>
                                </select>
                            </td>
                            <td><input type="text" size="3" maxlength="3" name="fish_lvl" value="<?php echo $fslvl; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Goldsmithing</th>
                            <td>
                                <select name="gsmith_rnk">
                                    <option>Select Rank</option>
                                    <option value="Amateur" <?php selected('Amateur', $gsrnk); ?>>Amateur</option>
                                    <option value="Recruit" <?php selected('Recruit', $gsrnk); ?>>Recruit</option>
                                    <option value="Initiate" <?php selected('Initiate', $gsrnk); ?>>Initiate</option>
                                    <option value="Novice" <?php selected('Novice', $gsrnk); ?>>Novice</option>
                                    <option value="Apprentice" <?php selected('Apprentice', $gsrnk); ?>>Apprentice</option>
                                    <option value="Journeyman" <?php selected('Journeyman', $gsrnk); ?>>Journeyman</option>
                                    <option value="Craftsman" <?php selected('Craftsman', $gsrnk); ?>>Craftsman</option>
                                    <option value="Artisan" <?php selected('Artisan', $gsrnk); ?>>Artisan</option>
                                    <option value="Adept" <?php selected('Adept', $gsrnk); ?>>Adept</option>
                                    <option value="Veteran" <?php selected('Veteran', $gsrnk); ?>>Veteran</option>
                                </select>
                            </td>
                            <td><input type="text" size="3" maxlength="3" name="gsmith_lvl" value="<?php echo $gslvl; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Leathercraft</th>
                            <td>
                                <select name="lthr_rnk">
                                    <option>Select Rank</option>
                                    <option value="Amateur" <?php selected('Amateur', $ltrnk); ?>>Amateur</option>
                                    <option value="Recruit" <?php selected('Recruit', $ltrnk); ?>>Recruit</option>
                                    <option value="Initiate" <?php selected('Initiate', $ltrnk); ?>>Initiate</option>
                                    <option value="Novice" <?php selected('Novice', $ltrnk); ?>>Novice</option>
                                    <option value="Apprentice" <?php selected('Apprentice', $ltrnk); ?>>Apprentice</option>
                                    <option value="Journeyman" <?php selected('Journeyman', $ltrnk); ?>>Journeyman</option>
                                    <option value="Craftsman" <?php selected('Craftsman', $ltrnk); ?>>Craftsman</option>
                                    <option value="Artisan" <?php selected('Artisan', $ltrnk); ?>>Artisan</option>
                                    <option value="Adept" <?php selected('Adept', $ltrnk); ?>>Adept</option>
                                    <option value="Veteran" <?php selected('Veteran', $ltrnk); ?>>Veteran</option>
                                </select>
                            </td>
                            <td><input type="text" size="3" maxlength="3" name="lthr_lvl" value="<?php echo $ltlvl; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Woodworking</th>
                            <td>
                                <select name="wood_rnk">
                                    <option>Select Rank</option>
                                    <option value="Amateur" <?php selected('Amateur', $wdrnk); ?>>Amateur</option>
                                    <option value="Recruit" <?php selected('Recruit', $wdrnk); ?>>Recruit</option>
                                    <option value="Initiate" <?php selected('Initiate', $wdrnk); ?>>Initiate</option>
                                    <option value="Novice" <?php selected('Novice', $wdrnk); ?>>Novice</option>
                                    <option value="Apprentice" <?php selected('Apprentice', $wdrnk); ?>>Apprentice</option>
                                    <option value="Journeyman" <?php selected('Journeyman', $wdrnk); ?>>Journeyman</option>
                                    <option value="Craftsman" <?php selected('Craftsman', $wdrnk); ?>>Craftsman</option>
                                    <option value="Artisan" <?php selected('Artisan', $wdrnk); ?>>Artisan</option>
                                    <option value="Adept" <?php selected('Adept', $wdrnk); ?>>Adept</option>
                                    <option value="Veteran" <?php selected('Veteran', $wdrnk); ?>>Veteran</option>
                                </select>
                            </td>
                            <td><input type="text" size="3" maxlength="3" name="wood_lvl" value="<?php echo $wdlvl; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Synergy</th>
                            <td>
                                <select name="syn_rnk">
                                    <option>Select Rank</option>
                                    <option value="Amateur" <?php selected('Amateur', $synrnk); ?>>Amateur</option>
                                    <option value="Recruit" <?php selected('Recruit', $synrnk); ?>>Recruit</option>
                                    <option value="Initiate" <?php selected('Initiate', $synrnk); ?>>Initiate</option>
                                    <option value="Novice" <?php selected('Novice', $synrnk); ?>>Novice</option>
                                    <option value="Apprentice" <?php selected('Apprentice', $synrnk); ?>>Apprentice</option>
                                    <option value="Journeyman" <?php selected('Journeyman', $synrnk); ?>>Journeyman</option>
                                    <option value="Craftsman" <?php selected('Craftsman', $synrnk); ?>>Craftsman</option>
                                    <option value="Artisan" <?php selected('Artisan', $synrnk); ?>>Artisan</option>
                                    <option value="Adept" <?php selected('Adept', $synrnk); ?>>Adept</option>
                                    <option value="Veteran" <?php selected('Veteran', $synrnk); ?>>Veteran</option>
                                </select>
                            </td>
                            <td><input type="text" size="3" maxlength="3" name="syn_lvl" value="<?php echo $synlvl; ?>" /></td>
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
?>