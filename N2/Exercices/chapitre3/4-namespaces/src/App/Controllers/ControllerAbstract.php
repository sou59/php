<?php
    namespace App;
    
abstract class ControllerAbstract
{

    protected $vue;

    public function __construct(Vue $vue)
    {
        $this->vue = $vue;
    }

    abstract public function init();

    abstract public function action();
}
