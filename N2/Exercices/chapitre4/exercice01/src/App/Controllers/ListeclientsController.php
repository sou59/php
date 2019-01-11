<?php

namespace App\Controllers;

use App\Application;
use App\Clients\ClientsManager;

class ListeclientsController extends ControllerAbstract
{

    public function init()
    {
        // Définir la structure par défaut
        $this->vue->setLayout('extranet');

        $this->climan = new ClientsManager(Application::getInstance()->getDb());
    }

    public function action()
    {

        if (isset($_GET['action']) && $_GET['action'] == "delete") {
            $this->actionDelete($_GET['id']);
            unset($this->climan[$_GET['id']]);
        }

        $this->actionAfficher();
    }

    protected function actionAfficher()
    {
        $this->vue->clients = $this->climan;
    }

    protected function actionDelete($id)
    {
        $this->climan[$id]->delete();
    }
}
