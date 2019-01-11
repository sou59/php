<?php

class LoginController
{

    protected $vue;

    function __construct($vue) {
        $this->vue = $vue;
    }
    public function init()
    {
    }

    public function action()
    {
        // Test du Login/Mot de passe
        if (isset($_POST['username']) && isset($_POST['userpass'])) {
            if ($_POST['username'] == 'admin' && $_POST['userpass'] == 'coucou') {
                $_SESSION[Application::SESS_NS_AUTH]['userrole'] = 'ADMIN';
                $_SESSION[Application::SESS_NS_AUTH]['fullname'] = 'Administrateur';
                $_SESSION[Application::SESS_NS_AUTH]['test_IP']  = $_SERVER['REMOTE_ADDR'];
                header("location: index.php?page=extranet");
                exit();
            } 
        }
    }
}
