<?php

namespace App\Clients;

use \App\Forfaits\ForfaitFactory;

class Client
{

    protected $db;
    protected $id;
    protected $civilite;
    protected $prenom;
    protected $nom;
    protected $lignes = array();

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function ajouterLigne($numero, $forfait)
    {
        $this->lignes["$numero"] = ForfaitFactory::create($forfait);
        return $this;
    }

    public function getLignes()
    {
        return $this->lignes;
    }

    public function utiliserData($numLigne, $qty)
    {
        return $this->lignes["$numLigne"]->utiliserData($qty);
    }

    public function getFullName()
    {
        return <<<"EOT"
            <span style=''>{$this->civilite}</span>
            <span style='text-transform:capitalize;'>{$this->prenom}</span>
            <span style='text-transform:capitalize;font-variant:small-caps;'>{$this->nom}</span>
EOT;
    }

    public function loadFromIndex($index)
    {
        $sql = <<<'EOT'
    SELECT idClient, civilite, prenom, nom, libelle AS libelleForfait, telephone, dataUsed
      FROM clients
 LEFT JOIN forfaits USING (codeForfait)
     WHERE idClient = ?
EOT;
        $row = $this->db->fetchRow($sql, array($index));
        return $this->loadFromDbRowObj($row);
    }

    public function loadFromDbRowObj($row)
    {
        if ($row) {
            $this->id = $row->idClient;
            $this->civilite = $row->civilite;
            $this->prenom = $row->prenom;
            $this->nom = $row->nom;
            if (isset($row->telephone)) {
                $this->ajouterLigne($row->telephone, $row->libelleForfait);
            }
            if (isset($row->dataUsed)) {
                $this->utiliserData($row->telephone, $row->dataUsed);
            }

            return true;
        }

        return false;
    }

    public function delete()
    {
        $this->db->delete("clients", "idClient = ? ", array($this->id));
    }
}
