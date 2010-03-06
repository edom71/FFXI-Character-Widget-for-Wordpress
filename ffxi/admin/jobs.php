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
				<legend>Basic Jobs</legend>
                    <table class="optiontable editform">
                        <tr valign="top">
                            <th align="left"><div class="field-label"><label for="war">Warrior</label></div></th>
                            <td><div class="field-widget"><input class="required validate-jobs" type="text" size="3" maxlength="3" name="war" value="<?php echo $war; ?>" /></div></td>
							<th align="left"><div class="field-label"><label for="whm">White Mage</label></div></th>
                            <td><div class="field-widget"><input class="required validate-jobs" type="text" size="3" maxlength="3" name="whm" value="<?php echo $whm; ?>" /></div></td>
                        </tr>
						<tr valign="top">
                            <th align="left"><div class="field-label"><label for="rdm">Red Mage</label></div></th>
                            <td><div class="field-widget"><input class="required validate-jobs" type="text" size="3" maxlength="3" name="rdm" value="<?php echo $rdm; ?>" /></div></td>
							<th align="left"><div class="field-label"><label for="mnk">Monk</label></div></th>
                            <td><div class="field-widget"><input class="required validate-jobs" type="text" size="3" maxlength="3" name="mnk" value="<?php echo $mnk; ?>" /></div></td>
                        </tr>
						<tr valign="top">
                            <th align="left"><div class="field-label"><label for="blm">Black Mage</label></div></th>
                            <td><div class="field-widget"><input class="required validate-jobs" type="text" size="3" maxlength="3" name="blm" value="<?php echo $blm; ?>" /></div></td>
							<th align="left"><div class="field-label"><label for="thf">Thief</label></div></th>
                            <td><div class="field-widget"><input class="required validate-jobs" type="text" size="3" maxlength="3" name="thf" value="<?php echo $thf; ?>" /></div></td>
                        </tr>
					</table>
				</fieldset>
				<br /><br />
				<fieldset class="options">
				<legend>Advanced Jobs</legend>
					<table class="optiontable editform">
                        <tr valign="top">
                            <th align="left"><div class="field-label"><label for="rng">Ranger</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="rng" value="<?php echo $rng; ?>" /></div></td>
                            <th align="left"><div class="field-label"><label for="smn">Summoner</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="smn" value="<?php echo $smn; ?>" /></div></td>
                        </tr>
                        <tr valign="top">
                            <th align="left"><div class="field-label"><label for="sam">Samurai</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="sam" value="<?php echo $sam; ?>" /></div></td>
                            <th align="left"><div class="field-label"><label for="nin">Ninja</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="nin" value="<?php echo $nin; ?>" /></div></td>
                        </tr>
                        <tr valign="top">
                            <th align="left"><div class="field-label"><label for="drg">Dragoon</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="drg" value="<?php echo $drg; ?>" /></div></td>
                            <th align="left"><div class="field-label"><label for="blu">Blue Mage</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="blu" value="<?php echo $blu; ?>" /></div></td>
                        </tr>
                        <tr valign="top">
                            <th align="left"><div class="field-label"><label for="pld">Paladin</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="pld" value="<?php echo $pld; ?>" /></div></td>
                            <th align="left"><div class="field-label"><label for="cor">Corsair</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="cor" value="<?php echo $cor; ?>" /></div></td>
                        </tr>
                        <tr valign="top">
                            <th align="left"><div class="field-label"><label for="drk">Dark Knight</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="drk" value="<?php echo $drk; ?>" /></div></td>
                            <th align="left"><div class="field-label"><label for="pup">Puppetmaster</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="pup" value="<?php echo $pup; ?>" /></div></td>
                        </tr>
                        <tr valign="top">
                            <th align="left"><div class="field-label"><label for="bst">Beastmaster</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="bst" value="<?php echo $bst; ?>" /></div></td>
                            <th align="left"><div class="field-label"><label for="dnc">Dancer</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="dnc" value="<?php echo $dnc; ?>" /></div></td>
                        </tr>
                        <tr valign="top">
                            <th align="left"><div class="field-label"><label for="brd">Bard</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="brd" value="<?php echo $brd; ?>" /></div></td>
                            <th align="left"><div class="field-label"><label for="sch">Scholar</label></div></th>
                            <td><div class="field-widget"><input class="validate-ajobs" type="text" size="3" maxlength="3" name="sch" value="<?php echo $sch; ?>" /></div></td>
                        </tr>
                    </table>
                    <div class="submit">
                        <input type="submit" name="updateopt" value="Update Stats &raquo;" />
                    </div>
                </fieldset>
            </form>
			<script type="text/javascript">
				function formCallback(result, form) {
					window.status = "valiation callback for form '" + form.id + "': result = " + result;
				}
				var valid = new Validation('jobs', {immediate : true, onFormValidate : formCallback});
				Validation.addAllThese([
					['validate-jobs', 'Please input a job level between 1 and 80. Anything higher is invalid.', {
						min: 1,
						max: 80,
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