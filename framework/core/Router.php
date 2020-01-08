<?php

namespace pl\core;

class Router {

	private static $route;
	private static $alias;
	private static $controller;
	private static $action;
	private static $layout;
	private static $params;

	
	
	public static function serve() {
		$uri = Request::getUri();

		foreach(Config::get('routes') as $likeUriPattern => $route) {
			$pattern = self::makePattern($likeUriPattern);
			
			if(preg_match($pattern, $uri, $mathes)) {
				if(is_string($route)) {
					$routeParts = explode('/', $route);
					self::$route = $route;
					self::$controller = array_shift($routeParts);
					self::$action = array_shift($routeParts);
					self::$layout = array_shift($routeParts);
					self::$params = array_slice($mathes, 1);

					if(!self::$controller) 
						throw new \Exception(EM::ControllerNotExistsForUrl($pattern));

					if(!self::$action) 
						throw new \Exception(EM::ActionNotExistsForUrl($pattern));
				} else {
					throw new \Exception(EM::RouteConfigValueMustString());
				}
				break;
			}
		}
		
	}



	private static function makePattern($pattern) {
		if(!is_string($pattern)) throw new \Exception('keys in routes propery in the config must be a string');

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
		if(!self::$controller) return null;

		return ucfirst(self::$controller).'Controller';
	}

	public static function getAction() {
		return self::$action;
	}

	public static function getActionName() {
		if(!self::$action) return null;

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