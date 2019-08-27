<?php

defined("PL_DEV") or define("PL_DEV", true);

defined("PL_BASE_DIR") or define("PL_BASE_DIR", dirname(dirname(dirname(dirname(__DIR__)))));

defined("PL_CONTROLLER_DIR") or define("PL_CONTROLLER_DIR", PL_BASE_DIR . '/controllers/');

defined("PL_VIEW_DIR") or define("PL_VIEW_DIR", PL_BASE_DIR . '/views/');

defined("PL_LAYOUT_DIR") or define("PL_LAYOUT_DIR", PL_BASE_DIR . '/views/layouts/');

defined("PL_CONFIG_DIR") or define("PL_CONFIG_DIR", PL_BASE_DIR . '/config/');

defined("PL_LOG_DIR") or define("PL_LOG_DIR", PL_BASE_DIR . '/log/');

defined("RESPONSE_ERROR_AS_JSON", true);

if(PL_DEV) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}

set_exception_handler(function($e) {

	$output = '';
	$message = '';
	$code = $e->getCode();
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
		$output .= '<b>' . get_class($e) . '</b>: '. $message .', <b>Line of error: ' . $file . ' ' . $line . "</b>\n\n";
		$output .= $trace;
		$output .= '</pre>';
		
		if(RESPONSE_ERROR_AS_JSON) {
			pl\util\Util::sendJson([
				'error' => [
					'message' => $message,
					'code' => $code,
					'file' => $file,
					'line' => $line,
					'trace' => $trace
				]
			]);
		} else {
			echo $output;
		}
	} else {
		$output = get_class($e) . ': '. $message .', Line of error: ' . $file . ' ' . $line;
		pl\core\Logger::log($output);
		pl\util\Util::sendJson([
			'error' => [
				'message' => $message,
				'code' => $code,
			]
		]);
	}
});


set_error_handler(function($code, $message, $file, $line) {
	throw new ErrorException($message, $code, E_ERROR, $file, $line);
});



