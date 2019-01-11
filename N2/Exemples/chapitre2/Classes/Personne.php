<?php
abstract class Personne {
    protected $prenom = null;
    protected $nom    = null;
    
    public function modifier($prenom, $nom, $paramnull=null) {
        if (!is_null($paramnull)) trigger_error("Personnes::modifier() : Le troisième paramètre n'est pas utilisé", E_USER_NOTICE);
        
        $this->prenom = $prenom;
        $this->nom    = $nom;
    }
    
    abstract public function afficher();
}

class PersonneVrai extends Personne {
    public function afficher() {
        throw new Exception("Méthode non implémentée");
    }
}