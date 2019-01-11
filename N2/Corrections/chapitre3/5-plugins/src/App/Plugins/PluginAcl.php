<?php

namespace App\Plugins;

use App\Application;

class PluginAcl implements PluginsInterface
{

    protected $acl;

    public function init()
    {
        $this->acl['GUEST'][]  = "index";
        $this->acl['GUEST'][]  = "erreur403";
        $this->acl['GUEST'][]  = "login";

        $this->acl['CLIENT']   = $this->acl['GUEST'];
        $this->acl['CLIENT'][] = "extranet";
        $this->acl['CLIENT'][] = "detailsclient";
        $this->acl['CLIENT'][] = "logout";

        $this->acl['ADMIN']    = $this->acl['GUEST'];
        $this->acl['ADMIN'][]  = "extranet";
        $this->acl['ADMIN'][]  = "logout";
        $this->acl['ADMIN'][]  = "listeclients";
    }

    public function afterDispatch(\App\Vue $vue)
    {
        
    }

    public function beforeDispatch($page)
    {
        $role = strtoupper(isset($_SESSION[Application::SESS_NS_AUTH]['userrole'])
                               ? $_SESSION[Application::SESS_NS_AUTH]['userrole']
                               : "GUEST");

        // Aucun test d'ACL en mode DEBUG PAS À PAS
        // [Attention] Faille de sécurité en l'état !
        if (!isset($_GET['XDEBUG_SESSION_START'])) {
            if (!isset($this->acl[$role])) {
                trigger_error("Le rôle [$role], n'est pas défini dans la liste des ACLs", E_USER_ERROR);
            } elseif (!in_array($page, $this->acl[$role])) {
                header("location: index.php?page=erreur403");
                exit();
            }
        }
    }
}
