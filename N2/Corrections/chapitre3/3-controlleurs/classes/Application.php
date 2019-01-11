<?php

class Application
{
    protected static $instance;
    
    const SESS_NS_AUTH = 'auth';

    protected function __construct()
    {
	$this->sessionStart();
	$this->gpc();
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
        // Suivant les param�tres GET, on choisi la page � afficher
        // Attention ! Echappement de $_GET['page']
        $page = strtolower(isset($_GET['page']) ? basename($_GET['page']) : "index");

        $vue = new Vue($page);
        
        // On recherche le controlleur associé
        $className = ucfirst($page) . 'Controller';
        if (class_exists($className)) {
            $ctrl = new $className($vue);
            $ctrl->init();
            $ctrl->action();
        } else { // Cas par défaut, si le controlleur n'existe pas
            $vue->setLayout('default');
            $vue->setMenuTop('guest');
        }
        
        $vue->afficher();
    }

    protected function sessionStart(){
        session_start(); // Utiliser la session g�r� par PHP
    }
    
    protected function gpc() {
 	// En cas de formulaire avec PHP < 5.4
	if (get_magic_quotes_gpc()) { // N�cessaire sur PHP < 5.4, si l'option n'est pas
                                      // d�sactiv� par d�faut dans la configuration serveur
            foreach ($_GET as $name => $val) {
                $_GET[$name] = stripslashes($val);
            }
            foreach ($_POST as $name => $val) {
                $_POST[$name] = stripslashes($val);
            }
            foreach ($_COOKIE as $name => $val) {
                $_COOKIE[$name] = stripslashes($val);
            }
        }
    }
    
    protected function registerAutoloader()
    {
        spl_autoload_register(function ($className) {

            $fileName = APP_ROOT . '/classes/' . $className . '.php';

            if (file_exists($fileName)) {
                require_once $fileName;
                
                return true;
            }

            return false; // On laisse le syst�me l�ver une erreur fatale !
        });
    }
    
}
