<?php

namespace pl\core;

class App
{
	public function run()
	{
		Config::init();
		Request::process();
		DB::connect();
		Session::start();
		Router::serve();
		Controller::run();
	}
}
