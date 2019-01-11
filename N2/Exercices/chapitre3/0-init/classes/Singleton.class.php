<?php
abstract class Singleton {
   private static $_instance = null;

   // Les divers mode d'instantiation sont prívés
   private function __construct() { }
   private function __clone()     { }
   private function __wakeup()    { }

   public static function getInstance() {
       if ( is_null(self::$_instance) ) {
           $className = get_called_class();
           self::$_instance = new $className;
       }
       return self::$_instance;
   }
}
