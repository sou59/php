<?php

class Application
{
    protected static $instance;

    protected function __construct()
    {
        $this->sessionStart();
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
        
        // Permet de donner un paramètre utilisable directement dans les vues PHTML
        $vue->pageEnCours = $page;
        $vue->doctype     = '<!DOCTYPE html>';
        $vue->charset     = 'UTF-8';
        // ... autres paramètres globaux aux vues si nécessaires
        
        // Affiche la vue
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
