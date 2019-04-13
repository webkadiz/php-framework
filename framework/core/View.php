<?php

class View {
	private static $view_path;
	private static $layouts_path;
	private static $app;
	private static $vars;


	static function init() {

	}

	static function set($key, $value = null) {
		if(is_array($key)) {
			foreach($key as $key_item => $value_item) {
				self::$vars[$key_item] = $value_item;
			}
			return;
		}

		self::$vars[$key] = $value;
	}

	static function setViewPath() {
		$custom_view_path = null;

		// ищем пользовательские пути страницы
		foreach(Config::get('custom_paths') as $alias => $view_path) 
			if($alias === Router::getAlias()) {
				$custom_view_path = $view_path;
				break;
			}

		if($custom_view_path) // если пользователь установил путь до страницы, то испольуем
			self::$view_path = VIEWS_DIR.$custom_view_path.'.php';
		elseif (!Router::getControllerName()) // если страница статичная
			self::$view_path = STATIC_DIR.Router::getAction().'.php';
		else // путь, который формирует фреймворк
			self::$view_path = VIEWS_DIR.Router::getController().'/'. 			Router::getAction().'.php';
		
	}

	static function setLayoutPath() {
		$custom_layout_path = null;

		// ищем пользовательские пути макета
		foreach(Config::get('custom_paths') as $layout_name => $layout_path)
			if($layout_name === Router::getLayout()) { 
				$custom_layout_path = $layout_path;
				break;
			}
		
		if($custom_layout_path) // если пользователь установил путь до макета, то испольуем
			self::$layouts_path = LAYOUTS_DIR.Router::getLayoutPath().'.php';
		elseif (Router::getLayout()) // путь, который формирует фреймворк, если макет существует
		 	self::$layouts_path = LAYOUTS_DIR.Router::getLayout().'.php';		
		
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

	static function render() {

		self::setViewPath();
		self::setLayoutPath();
		self::setAssets('css');
		self::setAssets('js');


		extract(self::$vars);
		ob_start();

		if(self::$layouts_path) {
			require_once self::$view_path;
			$content = ob_get_contents();
			ob_clean();
			
			require_once self::$layouts_path;
			$output = ob_get_contents();
		} else {
			require_once self::$view_path;
			$output = ob_get_contents();
			ob_end_clean();
		}

		return $output;

	}
}