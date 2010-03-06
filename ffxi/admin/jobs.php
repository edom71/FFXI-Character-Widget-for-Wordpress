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

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']))
{ 
	die('You are not allowed to call this page directly.');
}

function ffxi_job_stats_header() {

	echo '<link type="text/css" rel="stylesheet" href="'.FFXI_URLPATH.'ffxi.css" media="screen" />';
	echo '<script type="text/javascript" src="'.FFXI_URLPATH.'/scripts/prototype.js"></script>';
	echo '<script type="text/javascript" src="'.FFXI_URLPATH.'/scripts/validation.js"></script>';
	echo '<script type="text/javascript" src="'.FFXI_URLPATH.'/scripts/effects.js"></script>';
}

function ffxi_job_stats_header2() { ?>

	<!-- testing -->
<?php
}
add_action('admin_head', 'ffxi_job_stats_header2');
#add_action('admin_head', 'ffxi_job_stats_header');

function ffxi_job_stats() {
	global $wpdb;
	
	# Get database info
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
	
	if ( isset($_POST['updateopt']) ) {
		check_admin_referer('ffxi_job_stats');
		
		$whm = attribute_escape($_POST[whm]);
		$blm = attribute_escape($_POST[blm]);
		$rdm = attribute_escape($_POST[rdm]);
		$war = attribute_escape($_POST[war]);
		$thf = attribute_escape($_POST[thf]);
		$mnk = attribute_escape($_POST[mnk]);
		$pld = attribute_escape($_POST[pld]);
		$sam = attribute_escape($_POST[sam]);
		$nin = attribute_escape($_POST[nin]);
		$smn = attribute_escape($_POST[smn]);
		$rng = attribute_escape($_POST[rng]);
		$drg = attribute_escape($_POST[drg]);
		$drk = attribute_escape($_POST[drk]);
		$blu = attribute_escape($_POST[blu]);
		$cor = attribute_escape($_POST[cor]);
		$pup = attribute_escape($_POST[pup]);
		$dnc = attribute_escape($_POST[dnc]);
		$sch = attribute_escape($_POST[sch]);
		$bst = attribute_escape($_POST[bst]);
		$brd = attribute_escape($_POST[brd]);
		
		$result = $wpdb->query("UPDATE $wpdb->ffxistats_jobs SET whmlvl='$whm', blmlvl='$blm', rdmlvl='$rdm', warlvl='$war', thflvl='$thf', mnklvl='$mnk'");
		$result2 = $wpdb->query("UPDATE $wpdb->ffxistats_ajobs SET pldlvl='$pld', samlvl='$sam', ninlvl='$nin', smnlvl='$smn', rnglvl='$rng', drglvl='$drg', drklvl='$drk', blulvl='$blu', corlvl='$cor', puplvl='$pup', dnclvl='$dnc', schlvl='$sch', bstlvl='$bst', brdlvl='$brd'");

		$messagetext = '<font color="green">Jobs updated successfully.</font>';
	}

	if (!empty($messagetext))
	{
		echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$messagetext.'</p></div>';
	}

	?>
    <div class="wrap">
        <div id="jobinfo">
            <h2>Job Levels</h2>
            <form name="joblevels" method="post" name="jobs" id="jobs">
                <?php wp_nonce_field('ffxi_job_stats'); ?>
                <fieldset class="options">
                    <table class="optiontable editform">
                        <tr valign="top">
                            <th align="left">Warrior</th>
                            <td><input class="validate-jobs" type="text" size="3" maxlength="3" name="war" value="<?php echo $war; ?>" /></td>
                            <th align="left">Ranger</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="rng" value="<?php echo $rng; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">White Mage</th>
                            <td><input class="validate-jobs" type="text" size="3" maxlength="3" name="whm" value="<?php echo $whm; ?>" /></td>
                            <th align="left">Summoner</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="smn" value="<?php echo $smn; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Red Mage</th>
                            <td><input class="validate-jobs" type="text" size="3" maxlength="3" name="rdm" value="<?php echo $rdm; ?>" /></td>
                            <th align="left">Samurai</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="sam" value="<?php echo $sam; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Monk</th>
                            <td><input class="validate-jobs" type="text" size="3" maxlength="3" name="mnk" value="<?php echo $mnk; ?>" /></td>
                            <th align="left">Ninja</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="nin" value="<?php echo $nin; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Black Mage</th>
                            <td><input class="validate-jobs" type="text" size="3" maxlength="3" name="blm" value="<?php echo $blm; ?>" /></td>
                            <th align="left">Dragoon</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="drg" value="<?php echo $drg; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Thief</th>
                            <td><input class="validate-jobs" type="text" size="3" maxlength="3" name="thf" value="<?php echo $thf; ?>" /></td>
                            <th align="left">Blue Mage</th>
                            <td><input class="validate-jobs" type="text" size="3" maxlength="3" name="blu" value="<?php echo $blu; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Paladin</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="pld" value="<?php echo $pld; ?>" /></td>
                            <th align="left">Corsair</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="cor" value="<?php echo $cor; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Dark Knight</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="drk" value="<?php echo $drk; ?>" /></td>
                            <th align="left">Puppetmaster</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="pup" value="<?php echo $pup; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Beastmaster</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="bst" value="<?php echo $bst; ?>" /></td>
                            <th align="left">Dancer</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="dnc" value="<?php echo $dnc; ?>" /></td>
                        </tr>
                        <tr valign="top">
                            <th align="left">Bard</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="brd" value="<?php echo $brd; ?>" /></td>
                            <th align="left">Scholar</th>
                            <td><input class="validate-ajobs" type="text" size="3" maxlength="3" name="sch" value="<?php echo $sch; ?>" /></td>
                        </tr>
                    </table>
                    <div class="submit">
                        <input type="submit" name="updateopt" value="Update Stats &raquo;" />
                    </div>
                </fieldset>
            </form>
			<script type="text/javascript">
				var valid = new Validation('jobs', {immediate: true, onFormValidate: formCallback});
				Validation.addAllThese([
					['validate-jobs', 'Please input a job level between 1 and 80. Anything higher is invalid.', {
						min: 1,
						max: 80
					}],
					['validate-ajobs', 'Please input a job level between 0 and 80. A job level of 0 indicates the job has not yet been unlocked. Inputting anything higher is invalid.', {
						min: 0,
						max: 80
					}]
				]);
			</script>
        </div>
    </div>
<?php
}
?>