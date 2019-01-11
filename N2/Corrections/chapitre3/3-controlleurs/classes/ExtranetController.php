<?php

class ExtranetController extends ControllerAbstract
{

    public function init()
    {
        // Définir la structure par défaut
        $this->vue->setLayout('extranet');
        $this->vue->setMenuTop('admin');
        
        if (!isset($_SESSION[Application::SESS_NS_AUTH])
                || $_SESSION[Application::SESS_NS_AUTH]['userrole'] != 'ADMIN'
                || $_SESSION[Application::SESS_NS_AUTH]['test_IP'] != $_SERVER['REMOTE_ADDR']) {
            die('Vous n\'avez pas lez droits n&eacute;cessaires');
        }
    }

    public function action()
    {
        
    }
}
