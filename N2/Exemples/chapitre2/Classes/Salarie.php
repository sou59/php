<?php
class Salarie extends Personne {
    protected $numSalarie = null;
    
    public function __construct($prenom, $nom, $numSalarie) {
        parent::modifier($prenom, $nom);
        $this->numSalarie = $numSalarie;
    }
    
    public function afficher() {
        return <<<EOT
        <span class='num_salarie'>Salarie#$this->numSalarie</span>
        <span class='prenom'    >$this->prenom</span>
        <span class='nom'       >$this->nom</span>
EOT;
    }
    
    public function embaucher() {
        return "Embauche d'un nouveau salarié"
             . "<br />\n"
             . $this->afficher();
    } 

    public function virer() {
        return "Départ forcé d'un salarié"
             . "<br />\n"
             . $this->afficher();
    }
}