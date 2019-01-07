<?php
class ConfigurationSingleton {
   protected static $instance;
   
   protected $config = array();

   // Les divers mode de construction sont protégés
   protected function __construct() { }
   protected function __clone()     { }
   protected function __wakeup()    { }

   public static function getInstance() {
       if ( is_null(self::$instance) ) {
           self::$instance = new ConfigurationSingleton();
           self::$instance->loadConfig();
       }
       return self::$instance;
   }
   
   private function loadConfig() {
      // Charger la configuration de l'appli depuis des fichiers, des bdds, ...
      $this->config['nbEltPerPage'] = 10;
      $this->config['firstPage']    = 1;
   }
   public function __get($name) {
      // Récupérer les config
      return isset($this->config[$name]) ? $this->config[$name] : null;
   }
}

//$cfg = new ConfigurationSingleton(); // Erreur fatale
$cfg = ConfigurationSingleton::getInstance(); // Ok

var_dump($cfg->nbrEltPerPage);
