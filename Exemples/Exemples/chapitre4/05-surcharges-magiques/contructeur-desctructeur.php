<?php
    class MaClasse {
        protected $who = null;
        
        // Le contructeur n'a pas de canal de retour, donc pas d'instruction return
        function __construct($instanceName) {
            $this->who = $instanceName;
            
            echo "Appel du constructeur [$this->who] <br />\n";
        }
        
        // Le destructeur n'a ni canal de retour, ni arguments.
        function __destruct() {
            echo "Appel du destructeur [$this->who]<br />\n";
        }
    }
    
    $obj1 = new MaClasse('instance 1');
    $obj2 = new MaClasse('instance 2');
    $obj3 = new MaClasse('instance 3');
    
    unset($obj2);
    
    echo "Dernier echo de la page<br />\n";
