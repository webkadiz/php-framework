<?php

class App
{

	function __construct()
	{ }


	public function run()
	{
		Config::immutable();
		Request::process();
		DB::connect();
		Session::start();
		Router::serve();
		Response::init();
		View::init();

		if ($layout_controller_name = Router::getLayoutControllerName()) {
			if (class_exists($layout_controller_name)) {
				$layout_controller = new $layout_controller_name();
				$layout_controller->init();
			} else d("вы должны создать контроллер $layout_controller_name для маршрута {Router::getRoute()} или используйте маршрут для статического макета, занеся его название {Router::getLayout()} в массив настроек с ключом static_layouts");
		}
		if ($controller_name = Router::getControllerName()) {
			if (class_exists($controller_name)) {
				$controller = new $controller_name();
				$controller->init();
			} else d("вы должны создать контроллер $controller_name для маршрута {Router::getRoute()} или используйте маршрут для статической странцы заменив {Router::getController()}");
		}
	}
}
