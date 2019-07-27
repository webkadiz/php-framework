<?php

defined("PL_DEV") or define("PL_DEV", true);

defined("PL_BASE_DIR") or define("PL_BASE_DIR", dirname(dirname(dirname(dirname(__DIR__)))));

defined("PL_CONTROLLER_DIR") or define("PL_CONTROLLER_DIR", PL_BASE_DIR . '/controllers/');

defined("PL_VIEW_DIR") or define("PL_VIEW_DIR", PL_BASE_DIR . '/views/');

defined("PL_LAYOUT_DIR") or define("PL_LAYOUT_DIR", PL_BASE_DIR . '/views/layouts/');

defined("PL_CONFIG_DIR") or define("PL_CONFIG_DIR", PL_BASE_DIR . '/config/');

defined("PL_LOG_DIR") or define("PL_LOG_DIR", PL_BASE_DIR . '/log/');

if(PL_DEV) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}


set_exception_handler(function($e) {

	$output = '';
	$message = '';
	$line = $e->getLine();
	$file = $e->getFile();
	$trace = $e->getTraceAsString();

	if(method_exists($e, 'customMessage')) {
		$message = $e->customMessage();
	} else {
		$message = $e->getMessage();
	}


	if(PL_DEV) {
		$output .= '<pre>';
		$output .= '<b>Error</b>: '. $message .', <b>Line of error: ' . $file . ' ' . $line . "</b>\n\n";
		$output .= $trace;
		$output .= '</pre>';

		echo $output;
	} else {
		$output =  'Error: '. $message .', Line of error: ' . $file . ' ' . $line;
		pl\core\Logger::log($output);
	}
});


set_error_handler(function($code, $message, $file, $line) {
	throw new ErrorException($message, $code, E_ERROR, $file, $line);
});

foreach (glob(__DIR__.'/modules/*.module.php') as $path) {
	require $path;
}



