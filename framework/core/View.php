<?php

namespace pl\core;

use pl\exceptions\FileException;

class View extends PL {

	protected $controller;

	function __construct($controller) {		
		$this->controller = $controller;
	}

	function __get($name) {
		dump($name);
	}


	function set($key, $value = null) {
		if(is_array($key)) {
			foreach($key as $keyItem => $valueItem) {
				if(!$this->inClassProps($keyItem))
					$this->$keyItem = $valueItem;
			}
			return;
		}

		if(!$this->inClassProps($key))
			$this->$key = $value;
	}

	static function setAssets($assets_name) {
		$assets_config = Config::get($assets_name);
		$assets = [];
		$assets_string = '';

		
		if(array_key_exists('permament', $assets_config)) // подключаем файлы, которые загружаются на каждой странице
			if(!is_array($assets_config['permament']))
				d('ключ permament должен быть массивом строк путей до js файлов, которые будут загружаться на каждой странице');
			else foreach($assets_config['permament'] as $file) 
				$assets[] = $file;
		
			
		foreach($assets_config as $layout => $files) // подключаем файлы, которые загружаются на каждой странице макета
			if($layout === Router::getLayout())
				if(!is_array($files))
					d("ключ {Router::getLayout()} должен быть массивом строк путей до js файлов, которые будут загружаться на каждой странице макета");
				else foreach($files as $file) $assets[] = $file;
			
				
										
		foreach($assets_config as $alias => $files) // подключаем файлы, которые загружаются только на одной странице
			if($alias === Router::getAlias())
				if(!is_array($files))
					d("ключ {Router::getAlias()} должен быть массивом строк путей до js файлов, которые будут загружаться только на одной странице");
				else foreach($files as $file) $assets[] = $file;
			
				
			
		foreach($assets as $file)
			if(preg_match('~^(http|https|//|/)~', $file)) 
				$assets_string .= $assets_name === 'css' ? '<link href="'.$file.'"rel="stylesheet"/>' : '<script src="'.$file.'"></script>';
			else 
				$assets_string .= $assets_name === 'css' ? '<link href="'.CSS_DIR.$file.'"rel="stylesheet"/>' : '<script src="'.JS_DIR.$file.'"></script>';

		self::set($assets_name, $assets_string);
	}

	function render() {
		// self::setAssets('css');
		// self::setAssets('js');

		$view = $this->controller->getViewPath();
		$layout = $this->controller->getLayoutPath();

		if(!is_file($layout)) throw new FileException($layout);
		if(!is_file($view)) throw new FileException($view);
		
		ob_start();
		require_once $view;
		$content = ob_get_clean();
	
		ob_start();
		require_once $layout;
		$page = ob_get_clean();

		return $page;
	}

	function renderPartial() {
		
		$view = $this->controller->getViewPath();

		if(!is_file($view)) throw new FileException($view);

		ob_start();
		require_once $view;
		$page = ob_get_clean();

		return $page;
	}
}