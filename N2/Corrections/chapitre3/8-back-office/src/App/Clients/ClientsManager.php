<?php

namespace App\Clients;

class ClientsManager extends \ArrayObject
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

    public function loadClient($index)
    {
        $cli = new Client($this->db);
        if (!$cli->loadFromIndex($index)) {
            unset($cli);
            return false;
        } else {
            $this->alreadyLoaded[] = $index; // Permet de savoir les clients déjà dans la liste
            $this->offsetSet($index, $cli);
            return $cli;
        }
    }

    public function offsetGet($index)
    {
        if (!$this->offsetExists($index)) {
            $this->loadClient($index);
        }
        return parent::offsetGet($index);
    }

    public function getIterator()
    {
        if (!$this->allLoaded) {
            $sql = <<<'EOT'
        SELECT idClient, civilite, prenom, nom, libelle AS libelleForfait, telephone, dataUsed
          FROM clients
     LEFT JOIN forfaits USING (codeForfait)
         WHERE idClient NOT IN (?)
EOT;

            // array(0) est néssaire pour ne jamais fournir une liste vide à la requête SQL
            $rows = $this->db->fetchAll($sql, $this->alreadyLoaded ? $this->alreadyLoaded : array(0));
            
            foreach ($rows as $row) {
                $this[$row->idClient] = new Client($this->db);
                $this[$row->idClient]->loadFromDbRowObj($row);
                $this->alreadyLoaded[] = $row->idClient;
            }

            // Trier la liste, car si des clients avaient déjà été récupéré ils sont en début de liste
            $this->ksort();

            $this->allLoaded = true;
        }

        return parent::getIterator();
    }
}
