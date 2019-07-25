<?php

use pl\core\Controller;
use pl\core\Response;

class MainController extends Controller {



	public function indexAction() {
		$this->render('main/index', [
			'set' => 'Hello wolrd',
			'test' => 123,
			'controller' => 123
		]);
	}
	


}