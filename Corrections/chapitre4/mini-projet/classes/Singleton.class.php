<?php
abstract class Singleton {
  protected static $instance = array();
  
  // Les divers mode de construction sont prívés
  protected function __construct() { }
  protected function __clone()     { }
  protected function __wakeup()    { }
  
  public static function getInstance() {
    $className = get_called_class();
    if (!isset(self::$instance[$className])) {
      self::$instance[$className] = new $className;
    }
    return self::$instance[$className];
  }
}
