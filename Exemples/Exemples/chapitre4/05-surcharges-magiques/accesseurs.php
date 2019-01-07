<?php
    class MaClasse {
        protected $params = array();
     
        public function __set($name, $value) {
            echo "Appel de la fonction __set($name, $value)<br />";
            $this->params[$name] = $value;
        }
     
        public function __get($name) {
            echo "Appel de la fonction __get($name)<br />";
            return $this->params[$name];
        }
    }
    
    $obj = new MaClasse();
    
    $obj->attributNonDefini = 'Coucou';
    var_dump($obj->attributNonDefini);
    
    var_dump($obj);
    
    $obj->coucou1 = 1;
    $obj->coucou2 = 2;
    $obj->coucou3 = 3;
    $obj->coucou4 = 4;
    var_dump($obj);
