<?php

class DefaultLayoutController extends Controller {


	
	function init() {
		$this->app->view->set('title', 'hello wolrd');
	}

}