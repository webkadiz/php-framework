<?php

namespace pl\core;

class EM
{

  static function ControllerMethodNotExists()
  {
    return 'controller file exists but controller class ' .  Router::getControllerName() . ' not available for ' . Router::getRoute() . ' route';
  }

  static function ControllerFileNotExists()
  {
    return 'controller file ' . PL_CONTROLLER_DIR . Router::getControllerName() . '.php' . ' not exists for ' . Router::getRoute() . ' route';
  }

  static function ControllerUndefined()
  {
    return 'no one routes matches';
  }

  static function RouteConfigValueMustString()
  {
    return 'value of key routes in the config property must be a string';
  }

  static function ControllerNotExistsForUrl($pattern)
  {
    return 'specify a controller for the pattern url - "' . $pattern . '"';
  }

  static function ActionNotExistsForUrl($pattern)
  {
    return 'specify a action for the pattern url - "' . $pattern . '"';
  }
}
