<?php

namespace OCA\Passwords;

\OCP\Util::addStyle('passwords', 'settings');
\OCP\Util::addScript('passwords', 'settings');
\OCP\Util::addScript('passwords', 'sha512');

$tmpl = new \OCP\Template('passwords', 'part.personal');

return $tmpl->fetchPage();
