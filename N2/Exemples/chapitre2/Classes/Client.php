<?php
class Client extends Personne {
    protected $numClient = null;
    
    public function modifier($prenom, $nom, $numClient = null) {
        if (!is_numeric($numClient)) trigger_error("Clients::modifier() : \$numClient ne peut être vide et doit être numérique", E_USER_ERROR);
        
        parent::modifier($prenom, $nom);
        $this->numClient = $numClient;
    }
    
    public function afficher() {
        return <<<EOT
        <span class='num_client'>Client#$this->numClient</span>
        <span class='prenom'    >$this->prenom</span>
        <span class='nom'       >$this->nom</span>
EOT;
    }
}