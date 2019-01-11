<?php

namespace App\Plugins;

class PluginsArray extends \ArrayObject
{

    public function offsetSet($offset, $newval)
    {
        if (! $newval instanceof PluginsInterface) {
            trigger_error("Le paramétres doit être de type Plugins", E_USER_ERROR);
        }
        parent::offsetSet($offset, $newval);
    }

    public function __call($methodName, $arguments)
    {
        foreach ($this as $plugin) {
            call_user_func_array(array($plugin, $methodName), $arguments);
        }
    }
}
