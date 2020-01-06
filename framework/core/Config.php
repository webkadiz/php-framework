<?php

namespace pl\core;

use pl\exceptions\FileException;

class Config
{
	private static $config;
	private static $initialized = false;

	public static function get($stringPath)
	{
		$arrPath = explode('.', $stringPath);
		$arrCurrent = self::$config;
		$countPathOrigin = count($arrPath);
		$countPath = 0;

		foreach($arrPath as $partPath) {
			if(array_key_exists($partPath, $arrCurrent)) {
				$arrCurrent = $arrCurrent[$partPath];
				$countPath += 1;
			}
		}

		if($countPath === $countPathOrigin) {
			return $arrCurrent;
		} else {
			throw new \Exception('provide correct <b>' . $stringPath . '</b> property in the config');
		}

	}

	public static function init() {
		if(self::$initialized) return;

		self::$config = self::accumulateConfig();
		self::$initialized = true;
	}

	public static function accumulateConfig() {
		$mainLocalConfig = self::loadConfig('main-local.php');
		$mainConfig = self::loadConfig('main.php');

		$mergedConfig = $mainLocalConfig + $mainConfig;

		return $mergedConfig;
	}

	public static function loadConfig($name) {
	
		if(is_file(PL_CONFIG_DIR . $name)) {
			$arrayConfig = require_once PL_CONFIG_DIR . $name;
		} else {
			throw new FileException(PL_CONFIG_DIR . $name);
		}
		
		if(is_array($arrayConfig)) {
			return $arrayConfig;
		} else {
			throw new \Exception(PL_CONFIG_DIR . $name . ' must return array');
		}
	}
}
