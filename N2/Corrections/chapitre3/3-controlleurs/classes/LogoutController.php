<?php

class LogoutController extends ControllerAbstract
{

    public function init()
    {

    }

    public function action()
    {
        unset($_SESSION[Application::SESS_NS_AUTH]);
        header("location: index.php");
        exit();
    }
}
