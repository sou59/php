<?php
    class Personne {
        private $idPersonne;
        protected $prenom;
        protected $nom;
        
        // Permet de ne changer que le prénom
        function modifier($prenom) {
            $this->prenom = $prenom;
        }
    }
    
    class Client extends Personne {
        public $numeroClient;
        
        // Permet de changer le prénom ET le nom
        function modifier($prenom, $nom) {
            $this->prenom = $prenom;
            $this->nom    = $nom;
        }
    }
    
    class Salarie extends Personne {
        protected $idSalarie;
        
        // Fournis un numéro de salarié officiel
        function embaucher() {
            $this->idSalarie = mt_rand(10, 8000); // Valeur aléatoire entre 10 et 8000
        }
        
        // Motive « gentillement » à trouver un autre poste
        function motiverGentillementAPartir() {
            $this->idSalarie = null;
        }
    }
    
    $personne = new Personne();
    $client   = new Client();
    $salarie  = new Salarie();
    
    echo "État à vide :<br />\n";
    var_dump($personne, $client, $salarie);
    
    // Affectation de la civilité
    $client->modifier('Client', 'Super');
    $salarie->modifier('Salarié');
    
    echo "État après changement de la civilité :<br />\n";
    var_dump($client, $salarie);
    
    
    // Autres
    $client->numeroClient = 55;
    $salarie->embaucher();
    //$salarie->idSalarie = 5;   // FATAL ERROR
    //$personne->idPersonne = 5; // FATAL ERROR
    //$client->idPersonne = 5;   // FATAL ERROR
    //$salarie->idPersonne = 5;  // FATAL ERROR
    
    echo "État après autres changement :<br />\n";
    var_dump($client, $salarie);
