<?php

namespace App\Controllers;

use App\Application;

class _TestController extends ControllerAbstract
{

    public function init()
    {
        $this->vue->setLayout('_test');
    }

    public function action()
    {

    }
}
