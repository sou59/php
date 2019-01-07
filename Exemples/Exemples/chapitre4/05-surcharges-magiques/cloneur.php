<?php
    class MaClasse {
        public $who = null;
     
        public function __clone() {
            echo "Appel de la fonction __clone()<br />";
        }
    }
    
    $obj1 = new MaClasse();
    $obj1->who = 'Instance 1';
    
    $obj2 = $obj1;
    
    var_dump($obj1, $obj2);
    
    $obj2->who = 'Instance 2';
    var_dump($obj1, $obj2);
    
    $obj3 = clone $obj2;
    $obj3->who = 'Instance 3';
    var_dump($obj2, $obj3);
