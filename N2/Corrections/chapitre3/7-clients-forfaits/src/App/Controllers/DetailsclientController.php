<?php

namespace App\Controllers;

use App\Application;
use App\Clients\ClientsManager;

class DetailsclientController extends ControllerAbstract
{

    public function init()
    {
        // Définir la structure par défaut
        $this->vue->setLayout('extranet');
    }

    public function action()
    {
        $climan = new ClientsManager(Application::getInstance()->getDb());
        $this->vue->client = $climan[$_SESSION[Application::SESS_NS_AUTH]['id']];
    }
}
