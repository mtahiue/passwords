<?php 
	$class = '';
	if (OC::$server->getConfig()->getUserValue(OC::$server->getUserSession()->getUser()->getUID(), 'passwords', 'master_password', '0') == '0') {
		$class = 'hide_old_pass';
	}
?>
<div class="section" id="passwords-personal">
	<h2><?php p($l->t('Passwords')); ?></h2>

	<div>
		<label for="extra_password"><?php p($l->t('When entering app, require:')); ?></label>
		<select id="extra_password">
			<option value="none"><?php p($l->t('No extra password')); ?></option>
			<option value="owncloud" disabled><?php 
				// easier for translators than '%s password'
				p(preg_replace('/owncloud/i', $theme->getName(), $l->t('ownCloud password'))); ?></option>
			<option value="master"><?php p($l->t('Master password')); ?></option>
		</select>
		<br>
		<div id="show_lockbutton_div">
			<input class="checkbox" type="checkbox" id="show_lockbutton">
			<label for="show_lockbutton"><?php p($l->t('Show lock button')); ?></label>
		</div>
	</div>

	<div id="div_master_password">
		<p>
			<?php p($l->t('This will set a master password for the %s app. When set, you need to enter this password when activating the app.',  $theme->getName() . ' ' . $l->t("Passwords"))); ?>
			<br>
			<?php p($l->t("Note: this will only be used for the web interface. The master password does not re-encrypt your passwords.")); ?>
		</p>

		<input type="password" id="old_masterkey" placeholder="Enter old master password" class="<?php p($class); ?>">
		<br>
		<input type="password" id="new_masterkey1" placeholder="Enter new master password">
		<br>
		<input type="password" id="new_masterkey2" placeholder="Confirm new master password">
		<p>
			<?php p($l->t('Note: when you lose this password, you can never enter the %s app again!',  $theme->getName() . ' ' . $l->t("Passwords"))); ?>
		</p>
		<input class="button" type="button" id="save_masterkey" value="Save">
		<br>
	</div>

	<div id="icons_show_div">
		<input class="checkbox" type="checkbox" id="icons_show">
		<label for="icons_show"><?php p($l->t('Show website icons')); ?></label>
		<br><br>
	</div>

	<div>
		<input class="checkbox" type="checkbox" id="hide_usernames">
		<label for="hide_usernames"><?php p($l->t('Hide usernames')); ?></label>
		<br>
		<input class="checkbox" type="checkbox" id="hide_passwords">
		<label for="hide_passwords"><?php p($l->t('Hide passwords')); ?></label>
		<p>
			<?php p($l->t("This will show values as '*****', so you will need to click on a value to actually view it. This is useful to prevent others from making screenshots or taking photos of your password list")); ?>. 
			<br>
			<?php p($l->t("Note: the search function will not work on hidden values")); ?>.
		</p>
		<br>
	</div>

	<div>
		<input class="checkbox" type="checkbox" id="hide_attributes">
		<label for="hide_attributes"><?php p($l->t('Hide columns') . ": '" . strtolower($l->t('Strength')) . "' & '" . strtolower($l->t('Last changed')) . "'"); ?></label>
		<br><br>
	</div>

	<div>
		<input class="checkbox" type="checkbox" id="timer_bool">
		<label for="timer_bool"><?php p($l->t('Use inactivity countdown')); ?></label>
		<label>
			<input type="text" id="timer" value="0"> <em id="timersettext"> <?php p($l->t('seconds')); ?> </em>
		</label>
		<p>
			<?php p($l->t("This will put a timer on the lower right of the screen, which resets on activity.") . " " . $l->t("You will be logged off automatically when this countdown reaches 0") . ", " . " " . $l->t("or (if you've set an extra authentication password) the app will be locked down")); ?>.
		</p>
		<p>
			<?php p($l->t("Setting a countdown will log you off too when your session cookie ends (set to %s seconds by your administrator)", \OC::$server->getConfig()->getSystemValue('session_lifetime', 60*15))); ?>.
		</p>
	</div>

	<span class="msg-passwords"></span>
</div>
