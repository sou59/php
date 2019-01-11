<?php

namespace App\Controllers;

use App\Application;

class Erreur403Controller extends ControllerAbstract
{

    public function init()
    {

    }

    public function action()
    {
        header('HTTP/1.1 403 Forbiden');
    }
}
