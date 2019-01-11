<?php

namespace App\Plugins;

use App\Application;

class PluginLayout implements PluginsInterface
{

    public function init()
    {
        
    }

    public function afterDispatch($vue)
    {
        $role = strtoupper(isset($_SESSION[Application::SESS_NS_AUTH]['userrole'])
                               ? $_SESSION[Application::SESS_NS_AUTH]['userrole']
                               : "GUEST");
        $vue->setMenuTop(strtolower($role));
    }

    public function beforeDispatch()
    {

    }
}
