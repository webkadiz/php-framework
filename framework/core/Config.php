<?php

class Config
{
	private static $settings;
	private static $immutable = false;

	public static function set($key, $value)
	{
		if (self::$immutable) return false;

		if (strpos($key, 'dir')) {
			$value = rtrim($value, '/');
		}
		self::$settings[$key] = $value;
	}

	public static function get($key)
	{
		if (array_key_exists($key, self::$settings)) {
			return self::$settings[$key];
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
