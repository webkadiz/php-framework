<?php

namespace pl\core;

class Controller {
	private static $isRun = false;
	private $layoutDir = PL_LAYOUT_DIR;
	private $layoutPath = 'main';
	private $viewDir = PL_VIEW_DIR;
	private $viewPath;
	private $view;
	
	static function run() {
		if(self::$isRun) return false;
		
		$controllerName = Router::getControllerName();
		$controllerPath = PL_CONTROLLER_DIR . $controllerName . '.php';
		
		if($controllerName) {
			if(is_file($controllerPath)) {
				require_once $controllerPath;
				if(class_exists($controllerName)) {
					$controller = new $controllerName;
					self::$isRun = true;
					$controller->runAction();
				} else {
					throw new \Exception('controller file exists but controller class ' .  $controllerName . ' not available for ' . Router::getRoute() . ' route');
				}
			} else {
				throw new \Exception('controller file ' . $controllerPath. ' not exists for ' . Router::getRoute() . ' route');
			}
		} else {
			throw new \Exception('no one routes matches');
		}
		
	}
	
	function __construct(){
		$this->view = new View($this);
		$this->setViewPath(Router::getController() . '/' . Router::getAction());
	}
	
	final function runAction() {
		$action = Router::getActionName();

		if(method_exists($this, $action)) {
			$params = Router::getParams();
			//$params = array_filter($params, function($item) { return $item !== '';});
			$this->$action(...$params);
		} else {
			throw new \Exception("you must create $action in " . get_class($this) . " for " . Router::getRoute() . ' route');
		}

	}

	function getLayoutDir() {
		return $this->layoutDir;
	}

	function getLayoutPath() {
		return $this->getLayoutDir() . $this->layoutPath . '.php';
	}

	function setLayoutDir(string $layoutDir) {
		$layoutDir = rtrim($layoutDir, '/') . '/';
		
		$this->layoutDir = $layoutDir;
	}

	function setLayoutPath(string $layoutPath) {
		$this->layoutPath = $layoutPath;
	}

	function getView() {
		return $this->view;
	}

	function getViewDir() {
		return $this->viewDir;
	}

	function getViewPath() {
		return $this->getViewDir() . $this->viewPath . '.php';
	}

	function setViewDir(string $viewDir) {
		$viewDir = rtrim($viewDir, '/') . '/';

		$this->viewDir = $viewDir;
	}

	function setViewPath(string $viewPath) {
		$this->viewPath = $viewPath;
	}

	function render($view = [], $vars = []) {
		if(is_string($view)) {
			$this->setViewPath($view);

			$this->getView()->set($vars);
			echo $this->getView()->render();
		}

		elseif(is_array($view)) {
			$this->getView()->set($view);
			$this->getView()->render();
		}

		else {

			throw new \Exception('invalid arguments in render method');
		}

	}

}