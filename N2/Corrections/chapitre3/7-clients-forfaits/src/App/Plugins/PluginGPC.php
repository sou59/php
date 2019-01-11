<?php

namespace App\Plugins;

class PluginGPC implements PluginsInterface
{

    public function init()
    {
        // En cas de formulaire avec PHP < 5.4
        if (get_magic_quotes_gpc()) { // Nécessaire sur PHP < 5.4, si l'option pas désactivé
                                      // par défaut dans la configuration serveur
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

    public function afterDispatch($vue)
    {
        
    }

    public function beforeDispatch()
    {
        
    }
}
