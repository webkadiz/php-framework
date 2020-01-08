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
					throw new \Exception(EM::ControllerMethodNotExists());
				}
			} else {
				throw new \Exception(EM::ControllerFileNotExists());
			}
		} else {
			throw new \Exception(EM::ControllerUndefined());
		}
		
	}
	
	function __construct(){
		$this->view = new View($this);
		$this->response = new Response($this);
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

	function getResponse() {
		return $this->response;
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

			$this->view->set($vars);

			$page = $this->view->render();

			$this->response->send($page);

		} elseif(is_array($view)) {

			$this->view->set($view);

			$page = $this->view->render();

			$this->response->send($page);

		} else {
			throw new \Exception('invalid arguments in render method');
		}
	}

	function renderPartial($view = [], $vars = []) {
		if(is_string($view)) {
			$this->setViewPath($view);

			$this->view->set($vars);

			$page = $this->view->renderPartial();

			$this->response->send($page);

		} elseif(is_array($view)) {
			$this->view->set($view);

			$page = $this->view->renderPartial();

			$this->response->send($page);

		} else {
			throw new \Exception('invalid arguments in renderPartial method');
		}
	}

	function send($content) {
		$this->response->send($content);
	}

	function sendJSON($json) {
		$this->response->sendJSON($json);
	}

}