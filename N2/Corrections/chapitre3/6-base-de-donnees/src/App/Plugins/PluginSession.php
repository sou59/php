<?php

namespace App\Plugins;

class PluginSession implements PluginsInterface
{

    public function init()
    {
        session_start(); // Utiliser la session gérée par PHP
    }

    public function afterDispatch($vue)
    {
        
    }

    public function beforeDispatch()
    {
        
    }
}
