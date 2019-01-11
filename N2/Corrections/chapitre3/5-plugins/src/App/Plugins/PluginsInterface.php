<?php

namespace App\Plugins;

interface PluginsInterface
{

    public function init();

    public function beforeDispatch($page);

    public function afterDispatch(\App\Vue $vue);
}
