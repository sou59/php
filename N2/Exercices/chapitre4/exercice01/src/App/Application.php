<?php
namespace App;

class Application
{
    protected static $instance;
    
    protected $instanceDb;
    protected $plugins;
    protected $pluginClasses = array();
    
    const SESS_NS_AUTH = 'auth';

    protected function __construct()
    {
        $this->registerAutoloader();
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
        $this->initPlugins();

        $this->plugins->beforeDispatch();

        // Suivant les paramètres GET, on choisi la page à afficher
        // Attention ! Echappement de $_GET['page']
        $page = strtolower(isset($_GET['page']) ? basename($_GET['page']) : "index");

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

    public function registerPlugins($plugins)
    {
        if (is_string($plugins)) {
            $this->pluginClasses[] = $plugins;
        } elseif (is_array($plugins)) {
            $this->pluginClasses = array_merge($this->pluginClasses, $plugins);
        }
    }

    protected function initPlugins()
    {
        $this->plugins = new Plugins\PluginsArray();

        foreach ($this->pluginClasses as $pluginName) {
            $pluginClass = "\\App\\Plugins\\".$pluginName;
            $this->plugins[$pluginClass] = new $pluginClass;
        }

        $this->plugins->init();
    }

    
    protected function registerAutoloader()
    {
        spl_autoload_register(function ($className) {

            $fileName = APP_ROOT . '/src/' . str_replace('\\', '/', $className) . '.php';

            if (file_exists($fileName)) {
                require_once $fileName;
                
                return true;
            }

            return false; // On laisse le système léver une erreur fatale !
        });
    }
    
    public function getDb()
    {
        if (is_null($this->instanceDb)) {
            $this->instanceDb = \App\Bdd\BddFactory::create(
                'mysql',
                array(
                      'host'   => '127.0.0.1'
                    , 'user'   => 'formation-orange'
                    , 'pass'   => 'JLayzqz7whntEjJd'
                    , 'dbname' => 'formation-php-orange'
                )
            );
        }
        
        return $this->instanceDb;
    }
}
