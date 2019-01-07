<?php
    class MaClasse {
        public function __call($name, $args) {
            echo 'Appel de ['.$name.'] : '.implode(', ', $args)."<br />\n";
        }
    }
    
    $obj = new MaClasse();
    $obj->Coucou('Hello', 35, true);
    $obj->TraiterChoses();
    
    var_dump($obj);
