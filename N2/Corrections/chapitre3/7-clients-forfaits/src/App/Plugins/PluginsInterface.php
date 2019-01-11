<?php

namespace App\Plugins;

interface PluginsInterface
{

    public function init();

    public function beforeDispatch();

    public function afterDispatch($vue);
}
