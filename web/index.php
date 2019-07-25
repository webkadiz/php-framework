<?php


require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__ . '/../framework/bootstrap.php';





// Config::set('routes', [
//   '' => 'tech_main/technologist/index',
//   'technologist/install' => 'tech_install/technologist/install',
//   'technologist/config/(fields)' => 'tech_config/technologist/config/-/$1',

// ]);

///Config::set('file_log_dir', __DIR__ . '/logs');

// Config::set('static', 'const');

// Config::set('custom_paths', [
//   'tech_install' => 'main/install'
// ]);


// Config::set('static_layouts', [
// 	'default'
// ]);

// Config::set('css_dir', '/public/');
// Config::set('js_dir', '/public/build/');
// Config::set('img_dir', '/public/build/img/');

// Config::set('css', [
//  'permament' => ['https://fonts.googleapis.com/icon?family=Material+Icons']
// 	'tech_main' => ['style.css']
// ]);

// Config::set('js', [
//   'tech_main' => ["//api.bitrix24.com/api/v1/"],
//   'tech_project' => ['technologist.js']
// ]);

// Config::set('css', []);


// Config::set('db', [
//   'dbserver' => 'mysql',
//   'host' => 'localhost',
//   'dbname' => 'bitrix24',
//   'user' => 'root',
//   'password' => '',
//   'charset' => 'utf8',
// ]);


(new pl\core\App())->run();
