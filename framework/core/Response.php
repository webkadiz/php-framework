<?php

namespace pl\core;

class Response {

	function send($content = null) {
		echo $content;
	}

	function sendJSON($json) {
		$resultJSON = json_encode($json);

		if(!$resultJSON) {
			$resultJSON = json_encode([
				'error' => true,
				'error_message' => 'не получилось закодировать данные в json'
			]);
		}

		$this->send($resultJSON);
	}
}