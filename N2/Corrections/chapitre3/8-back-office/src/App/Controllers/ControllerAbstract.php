<?php
namespace App\Controllers;

abstract class ControllerAbstract
{

    protected $vue;

    public function __construct(\App\Vue $vue)
    {
        $this->vue = $vue;
    }

    abstract public function init();

    abstract public function action();
}
