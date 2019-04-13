<?php

class Session {
	private static $sessions;

	static function start() {
		session_start();
		self::$sessions = $_SESSION;
	}

	static function get($key) {
		if(key_exists($key, self::$sessions)) {
			return self::$sessions[$key];
		} else {
			return false;
		}
	}

	static function set($key, $value) {
		self::$sessions[$key] = $value;
	}

	static function extract() {
		foreach(self::$sessions as $sessionName => $sessionValue ) 
			$_SESSION[$sessionName] = $sessionValue;
	}
}