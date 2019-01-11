<?php
namespace App\Controllers;

use App\Application;
use App\Bdd\BddFactory;
use App\Clients\ClientsManager;

class LoginController extends ControllerAbstract
{

    public function init()
    {
        // Définir la structure par défaut
        $this->vue->setLayout('extranet');
    }

    public function action()
    {
        // Test du Login/Mot de passe
        if (isset($_POST['username']) && isset($_POST['userpass'])) {
            if ($_POST['username'] == 'admin' && $_POST['userpass'] == 'coucou') {
                $_SESSION[Application::SESS_NS_AUTH]['userrole'] = 'ADMIN';
                $_SESSION[Application::SESS_NS_AUTH]['fullname'] = 'Administrateur';
                $_SESSION[Application::SESS_NS_AUTH]['test_IP']  = $_SERVER['REMOTE_ADDR'];
                header("location: index.php?page=extranet");
                exit();
            } else {
                $climan = new ClientsManager(Application::getInstance()->getDb());
                if ($client = $climan->testUserAndPass($_POST['username'], $_POST['userpass'])) {
                    $_SESSION[Application::SESS_NS_AUTH]['id']       = $client->idClient;
                    $_SESSION[Application::SESS_NS_AUTH]['userrole'] = 'CLIENT';
                    $_SESSION[Application::SESS_NS_AUTH]['fullname'] = "$client->civilite $client->prenom $client->nom";
                    $_SESSION[Application::SESS_NS_AUTH]['test_IP']  = $_SERVER['REMOTE_ADDR'];
                    header("location: index.php?page=extranet");
                    exit();
                } else {
                    $this->vue->err = array("Erreur dans votre mot de passe !");
                }
            }
        }
    }
}
