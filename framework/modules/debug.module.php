<?php

function d($var, $type = false, $exit = false) {
	echo '<pre>';
	echo $type ? print_r($var) : var_dump($var);
	echo '</pre>';

	if ($exit) exit;
}

function dump(...$vars) {
	echo '<pre>';
	foreach($vars as $var) var_dump($var);
	echo '</pre>';
}