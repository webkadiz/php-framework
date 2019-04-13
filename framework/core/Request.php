<?php

class Request {
	private static $files;
	private static $request;
	private static $server;

	static function process() {
		self::$files = $_FILES;
		self::$request = $_REQUEST;
		self::$server = $_SERVER;
	}

	static function get($name) {
		if(!is_string($name)) {
			d("параметр должен $name быть строкой");
			return false;
		}

		$param = isset(self::$request[$name]) ? self::$request[$name] : false ;
		
		return $param;
	}

	static function getJSON($name) {
		if(!is_string($name)) {
			d("параметр должен $name быть строкой");
			return false;
		}

		$param = isset(self::$request[$name]) ? self::$request[$name] : false;
		
		return json_decode($param, true);
	}

	static function getFile($name) {
		if(!is_string($name)) {
			d("параметр должен $name быть строкой");
			return false;
		}

		$file = isset(self::$files[$name]) ? self::$files[$name] : false ;
		
		return $file;
	}

	static function getServer($name) {
		if(!is_string($name)) {
			d("параметр должен $name быть строкой");
			return false;
		}

		$name = strtoupper($name);

		$serverProp = isset(self::$server[$name]) ? self::$server[$name] : false ;
		
		return $serverProp;
	}

	static function getUri() {
		return self::cropUri();
	}

	private static function cropUri() {
		return trim(explode( '?', urldecode(self::getServer('request_uri')))[0], '/');
	}
}