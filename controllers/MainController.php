<?php

class MainController extends Controller {



	public function indexAction() {
		d($this->app->request->get('text'));
	}


}