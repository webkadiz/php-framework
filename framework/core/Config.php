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

	public static function immutable()
	{

		if (!self::get('db')) self::set('db', []);
		if (!self::get('custom_paths')) self::set('custom_paths', []);
		if (!self::get('static')) self::set('static', 'static');
		if (!self::get('static_layouts')) self::set('static_layouts', []);
		if (!self::get('js')) self::set('js', []);
		if (!self::get('css')) self::set('css', []);
		if (!self::get('lib')) self::set('lib', dirname(FRAMEWORK_DIR) . '/lib/');
		if (!self::get('controllers')) self::set('controllers', dirname(FRAMEWORK_DIR) . '/controllers/');
		if (!self::get('models')) self::set('models', dirname(FRAMEWORK_DIR) . '/models/');

		if (self::get('views_dir')) define('VIEWS_DIR', self::get('views_dir') . '/');
		else define('VIEWS_DIR', dirname(FRAMEWORK_DIR) . '/views/');

		if (self::get('layouts_dir')) define('LAYOUTS_DIR', self::get('layouts_dir') . '/');
		else define('LAYOUTS_DIR', VIEWS_DIR . 'layouts/');

		if (self::get('static_dir')) define('STATIC_DIR', self::get('static_dir') . '/');
		else define('STATIC_DIR', VIEWS_DIR . 'static/');

		if (self::get('public_dir')) define('PUBLIC_DIR', self::get('public_dir') . '/');
		else define('PUBLIC_DIR', '/public/');

		if (self::get('js_dir')) define('JS_DIR', self::get('js_dir') . '/');
		else define('JS_DIR', PUBLIC_DIR . 'js/');

		if (self::get('css_dir')) define('CSS_DIR', self::get('css_dir') . '/');
		else define('CSS_DIR', PUBLIC_DIR . 'css/');

		if (self::get('img_dir')) define('IMG_DIR', self::get('img_dir') . '/');
		else define('IMG_DIR', PUBLIC_DIR . 'img/');

		if (self::get('file_log_dir')) define('FILE_LOG_DIR', self::get('file_log_dir') . '/');
		else define('FILE_LOG_DIR', dirname(FRAMEWORK_DIR) . '/logs/');

		self::$immutable = true;
	}
}
