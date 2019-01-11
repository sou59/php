<?php
    // Permet d'informer quand PHPUNIT est en cours
    if (!defined("DEBUG_PHPUNIT")) {
        define("DEBUG_PHPUNIT", true);
    }
    
    // Fournis des informations que PHP n'a pas en mode CLI
    if (empty($_SERVER['REMOTE_ADDR'])) {
        $_SERVER['REMOTE_ADDR'] = '0.0.0.0';
    }
    
    // Définir le chemin du projet
    if (!defined('APP_ROOT')) {
        define('APP_ROOT', realpath(__DIR__ . '/..'));
    }
    chdir(APP_ROOT); // Modifier le dossier courant pour simuler au plus proche la présence dans l'application
    
    require APP_ROOT . '/src/App/Application.php';

    class ApplicationTestBootstrap extends \App\Application {
        // Définition du instance propre aux tests PhpUnit
        static protected $instancePhpUnit;
        public static function getInstance()
        {
            if (self::$instancePhpUnit === null) {
                self::$instancePhpUnit = new self;
            }

            return self::$instancePhpUnit;
        }
        // PHPUnit à besoin que __wakeup soit public pour fonctionner
        public function __wakeup() {
            parent::__wakeup();
        }

        
        public function publicRegisterAutoloader () {
            $this->registerAutoloader();
        }
    }
    
    $app = ApplicationTestBootstrap::getInstance();
    $app->publicRegisterAutoloader();