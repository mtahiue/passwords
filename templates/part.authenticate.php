<?php
	$auth_type = OC::$server->getConfig()->getUserValue(OC::$server->getUserSession()->getUser()->getUID(), 'passwords', 'extra_auth_type', 'owncloud');
	$instancename = $theme->getName();
	$passwordsname = $l->t("Passwords");
	$passwordsversion = OC::$server->getConfig()->getAppValue('passwords', 'installed_version', '');

	if ($auth_type == 'owncloud') {
		$auth_type = $l->t('%s password', $theme->getName());
	} elseif ($auth_type == 'master') {
		$auth_type = $l->t('Master password');
	}
?>
<div id="auth_div">
	<h2><?php p($l->t('Authenticate')); ?>:</h2>
	<input id="auth_pass" type="password" placeholder="<?php p($auth_type); ?>"><br>
	<?php
	if (isset($_GET['token'])) { ?>
		<p id="invalid_auth"><?php p($l->t('This password is invalid. Please try again.')); ?></p>
	<?php }	?>
	<input class="button primary" type="button" id="auth_btn" value="<?php p($l->t('Authenticate')); ?>">
	<p><?php p($l->t('You need to authenticate using a password.')); ?> <a href="/index.php/settings/personal"><?php p($l->t('This can be changed in your settings')); ?></a>.</p>
</div>
<div id="auth_footer">
	<p id="githubref"><a href="https://github.com/fcturner/passwords/" target="_blank"><?php p($instancename . ' ' . $passwordsname) ?></a>, v<?php p($passwordsversion) ?></p>
</div>
