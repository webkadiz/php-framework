<?php

require_once FRAMEWORK_DIR . 'core/Config.php';

spl_autoload_register(function ($class) {
	$dirs = [
		'',
		'core/',
		Config::get('lib'),
		Config::get('controllers'),
		Config::get('models'),
	];
	foreach ($dirs as $dir) {
		if (file_exists(FRAMEWORK_DIR . $dir . $class . '.php'))
			require FRAMEWORK_DIR . $dir . $class . '.php';
		elseif (file_exists($dir . $class . '.php'))
			require $dir . $class . '.php';
	}
});





foreach (glob(FRAMEWORK_DIR . 'modules/*.module.php') as $path) {
	require $path;
}
