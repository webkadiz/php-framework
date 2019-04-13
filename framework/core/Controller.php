<?php

class Controller {


	function __construct(){
	}

	function init() {
		$action = Router::getActionName();
		if(method_exists($this, $action)) {
			$params = Router::getParams();
			$params = array_filter($params, function($item) { return $item !== '';});
			$this->$action(...$params);
		} else d("вы должны создать метод $action в контроллере ".get_class($this)." для маршрута {Router::getRoute()}");
		
	}

}