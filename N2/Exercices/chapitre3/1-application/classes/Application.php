<?php

class Application
{
    protected static $instance;

    protected function __construct() {
    }

    protected function __clone() {
    }
	 
    /* [TODO] Assurer que notre classe réponde au principe d'un Singleton */

    public static function getInstance()
    {
        if(!isset(self::$instance)) {
            self::$instance = new self(); // comme si on faisait new Application
        }
        return self::$instance; // return new self(); nous sommes en static on ne peut pas utiliser $this
    }

    public function dispatch()
    {
        // Suivant les paramètres GET, on choisi la page à afficher
        $page = strtolower(isset($_GET['page']) ? basename($_GET['login']) : "index");
        
        var_dump($page);

        $tpl = TPL_ROOT . "/" . $page. ".phtml";

        if(file_exists($tpl)) {
            require $tpl;
        } else {
            require TPL_ROOT . "/index.phtml";
        }
        
        /* [TODO] Inclure le bon templates en fonction de $page */
    }

    protected function sessionStart(){
        session_start(); // Utiliser la session géré par PHP
    }
    
    protected function gpc() {
 	// En cas de formulaire avec PHP < 5.4
	if (get_magic_quotes_gpc()) { // Nécessaire sur PHP < 5.4, si l'option n'est pas
                                      // désactivé par défaut dans la configuration serveur
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
            
            /* [TODO] Configurer notre autoload correctement */
           // $fileName = "APP-ROOT . /templates/"

            if (file_exists($fileName)) {
                require_once $fileName;
                
                return true;
            }

            return false; // On laisse le système léver une erreur fatale !
        });
    }
    
}
