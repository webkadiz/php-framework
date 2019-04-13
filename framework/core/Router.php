<?php

class Router {

	private static $route;
	private static $alias;
	private static $controller;
	private static $action;
	private static $layout;
	private static $params;

	
	
	public static function serve() {
		$uri = Request::getUri();
		
		foreach(Config::get('routes') as $pattern => $route) {
			$pattern = self::modifyPattern($pattern);
			
			if(preg_match($pattern, $uri)) {
				if(is_string($route)) {
					$str_params = preg_replace($pattern, $route, $uri);
					$arr_params = explode('/', $str_params);
					self::$route = $route;
					self::$alias = array_shift($arr_params);
					self::$controller = array_shift($arr_params);
					self::$action = array_shift($arr_params);
					self::$layout = array_shift($arr_params);
					self::$params = $arr_params;
				} else d("значение ключа $pattern должно быть строкой");
				break;
			}
		}
		
	}
	
	public function init() {

	}

	private static function modifyPattern($pattern) {
		return '~^'.$pattern.'$~';
	}


	public static function getRoute() {
		return self::$route;
	}

	public static function getAlias() {
		return self::$alias;
	}

	public static function getController() {
		return self::$controller;
	}
	
	public static function getControllerName() {
		return self::getController() === Config::get('static') ? false : ucfirst(self::$controller).'Controller';
	}

	public static function getAction() {
		return self::$action;
	}

	public static function getActionName() {
		return self::$action.'Action';
	}

	public static function getLayout() {
		if(self::$layout && self::$layout !== '-' && self::$layout !== 'none') return self::$layout;
		return false;
	}

	public static function getLayoutControllerName() {
		return self::getLayout() 
			? in_array(self::getLayout(), Config::get('static_layouts')) 
				? false 
				: ucfirst(self::getLayout()).'LayoutController' 
			: false;
		
	}


	public static function getParams() {
		return self::$params;
	}

}