<?php

namespace App\Clients;

class ClientsManager
{

    protected $db;
    protected $allLoaded = false;
    protected $alreadyLoaded = array();

    public function __construct(\App\Bdd\BddInterface $db)
    {
        $this->db = $db;
    }

    public function testUserAndPass($username, $userpass)
    {
        $sql = "SELECT idClient, civilite, prenom, nom FROM clients WHERE LCASE(prenom) = ? AND LCASE(nom) = ?";
        $result = $this->db->fetchRow($sql, array(strtolower($username), strtolower($userpass)));

        return $result;
    }
}
