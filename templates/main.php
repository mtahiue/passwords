<?php

	function isSecure() {
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

		if (false !== strpos($url,'d=1')) {
			\OCP\Util::writeLog('passwords', 'Passwords app accessed without secure connection.', \OCP\Util::WARN);
			return true;
		}

		// test if at least one is true in:
		// (1) header, (2) port number, (3) config.php setting, (4) admin setting
	  	return
		(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
		|| $_SERVER['SERVER_PORT'] == 443
		|| \OC::$server->getConfig()->getSystemValue('forcessl', '')
		|| \OC::$server->getConfig()->getAppValue('passwords', 'https_check', 'true') == 'false';
	};

	style('passwords', 'style');
	style('passwords', 'spectrum'); // colour picker

	// check if secure (https)
	if (isSecure()) {

		script('passwords', 'sha512'); // hash function for master password
		$auth_type = OC::$server->getConfig()->getUserValue(OC::$server->getUserSession()->getUser()->getUID(), 'passwords', 'extra_auth_type', 'owncloud');
		if (isset($_GET['token'])) {
			$auth_master = hash('sha512', OC::$server->getUserSession()->getUser()->getUID() . OC::$server->getConfig()->getUserValue(OC::$server->getUserSession()->getUser()->getUID(), 'passwords', 'master_password', '0')) == $_GET['token'];
		} else {
			$auth_master = false;
		}

		if ($auth_type == 'owncloud' OR ($auth_type == 'master' AND $auth_master == false)) { 

			script('passwords', 'auth'); ?>
			
			<div id="app">
				<div id="app-content">
					<div id="app-content-wrapper">
						<?php print_unescaped($this->inc('part.authenticate')); ?>
					</div>
				</div>
			</div>

		<?php } else { 

			script('passwords', 'handlebars');
			script('passwords', 'script');
			script('passwords', 'sorttable');
			script('passwords', 'spectrum'); // colour picker
			script('passwords', 'ZeroClipboard'); // clipboard function
			?>

			<div id="app">
				<div id="app-navigation">
					<?php print_unescaped($this->inc('part.navigation')); ?>
					<?php print_unescaped($this->inc('part.settings')); ?>
				</div>

				<div id="app-content">
					<div id="app-content-wrapper">
						<?php print_unescaped($this->inc('part.content')); ?>
					</div>
					<div id="app-sidebar-wrapper">
						<?php print_unescaped($this->inc('part.sidebar')); ?>
					</div>
				</div>
			</div>
	<?php } ?>

<?php } else {
	\OCP\Util::writeLog('passwords', 'Passwords app blocked; no secure connection.', \OCP\Util::ERROR);
?>

	<div id="app">
		<div id="app-content">
			<div id="app-content-wrapper">
				<?php print_unescaped($this->inc('part.blocked')); ?>
			</div>
		</div>
	</div>

<?php } ?>
