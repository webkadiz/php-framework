<?php

class Logger {


	static function log($message) {
		file_put_contents(FILE_LOG_DIR.date('Y-m-d').'.log', 
		" ( ".date('H:i:s')." ) ".json_encode($message).PHP_EOL ,
		FILE_APPEND);
	}
}