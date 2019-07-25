<?php

//require_once FRAMEWORK_DIR . 'core/Config.php';

// spl_autoload_register(function ($class) {
// 	dump($class);
// 	$dirs = [
// 		'',
// 		'core/',
// 		Config::get('lib'),
// 		Config::get('controllers'),
// 		Config::get('models'),
// 	];
// 	foreach ($dirs as $dir) {
// 		$path = FRAMEWORK_DIR . $dir . $class . '.php';
// 		$sanPath = str_replace('\\', '/', $path);
		
// 		if (file_exists($sanPath)) {
// 			dump($sanPath);
// 			require_once $sanPath;
// 		}
// 		elseif (file_exists($dir . $class . '.php'))
// 			require_once str_replace('\\', '/', $dir . $class . '.php');
// 	}
// });



defined("PL_DEV") or define("PL_DEV", true);

defined("PL_BASE_DIR") or define("PL_BASE_DIR", dirname(__DIR__));

defined("PL_CONTROLLER_DIR") or define("PL_CONTROLLER_DIR", dirname(__DIR__) . '/controllers/');

defined("PL_VIEW_DIR") or define("PL_VIEW_DIR", dirname(__DIR__) . '/views/');

defined("PL_LAYOUT_DIR") or define("PL_LAYOUT_DIR", dirname(__DIR__) . '/views/layouts/');

defined("PL_CONFIG_DIR") or define("PL_CONFIG_DIR", dirname(__DIR__) . '/config/');


if(PL_DEV) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}

set_exception_handler(function($e) {

	$message = '';
	$line = $e->getLine();
	$file = $e->getFile();
	$trace = $e->getTraceAsString();

	if(method_exists($e, 'customMessage')) {
		$message = $e->customMessage();
	} else {
		$message = $e->getMessage();
	}

	echo '<pre>';
	echo '<b>Error</b>: '. $message .', <b>Line of error: ' . $file . ' ' . $line . "</b>\n\n";
	echo $trace;
	echo '</pre>';
});


foreach (glob(__DIR__.'/modules/*.module.php') as $path) {
	require $path;
}
