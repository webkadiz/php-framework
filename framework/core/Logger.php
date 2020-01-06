<?php

namespace pl\core;

class Logger {

	static function log($message) {
		file_put_contents(PL_LOG_DIR . date('d-m-Y'), 
		"[" . date('H:i:s') . "] " . $message . PHP_EOL ,
		FILE_APPEND);
	}

	static function logVarDump(...$vars) {

		ob_start();
		foreach($vars as $var) var_dump($var);
		$varDump = ob_get_clean();

		self::log($varDump);
	}
}