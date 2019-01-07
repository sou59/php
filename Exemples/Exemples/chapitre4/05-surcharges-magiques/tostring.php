<?php
    class Personne {
        protected $civilite = 'M.';
        protected $prenom   = 'olivier';
        protected $nom      = 'lonzi';
    
        public function __tostring() {
            return ucfirst($this->prenom).' '.strtoupper($this->nom);
        }
    }
    
    $obj = new Personne();
    
    echo $obj;
    var_dump((string) $obj);
    var_dump($obj);
