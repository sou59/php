<?php

namespace App;

class Application
{
    protected static $instance;
    
    protected $plugins;
    
    const SESS_NS_AUTH = 'auth';

    protected function __construct()
    {
        $this->registerAutoloader();
        $this->plugins = new Plugins\PluginsArray();
    }

    protected function __clone()
    {
        
    }

    protected function __wakeup()
    {
        
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function dispatch()
    {
        $this->plugins->init();
        
        // Suivant les param�tres GET, on choisi la page � afficher
        // Attention ! Echappement de $_GET['page']
        $page = strtolower(isset($_GET['page']) ? basename($_GET['page']) : "index");

        $this->plugins->beforeDispatch($page);

        $vue = new Vue($page);
        
        // On recherche le controlleur associé
        $className = '\\App\\Controllers\\' . ucfirst($page) . 'Controller';
        if (class_exists($className)) {
            $ctrl = new $className($vue);
            $ctrl->init();
            $ctrl->action();
        } else { // Cas par défaut, si le controlleur n'existe pas
            $vue->setLayout('default');
        }
        
        $this->plugins->afterDispatch($vue);
        
        $vue->afficher();
    }

    public function addPlugin(\App\Plugins\PluginsInterface $plugin)
    {
        $this->plugins[get_class($plugin)] = $plugin;
    }

    protected function registerAutoloader()
    {
        spl_autoload_register(function ($className) {

            $fileName = APP_ROOT . '/src/' . str_replace('\\', '/', $className) . '.php';

            if (file_exists($fileName)) {
                require_once $fileName;
                
                return true;
            }

            return false; // On laisse le syst�me l�ver une erreur fatale !
        });
    }
}
