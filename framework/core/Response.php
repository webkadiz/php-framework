<?php

class Response {


	static function init() {
	}

	static function send($content = null) {
		Session::extract();

		echo $content;
	}

	static function render($vars = null) {
		if($vars !== null) {
			if(is_array($vars)) {
				foreach($vars as $key => $value) {
					View::set($key, $value);
				}
			}
			else {
				d('первый аргумент функции response render должен быть массив');
			}
		}

		self::send(View::render());
	}

	static function sendJSON($json) {
		$result_json = json_encode($json);

		if(!$result_json) {
			$result_json = json_encode([
				'error' => true,
				'error_message' => 'не получилось закодировать данные в json'
			]);
		}

		self::send($result_json);
	}
}