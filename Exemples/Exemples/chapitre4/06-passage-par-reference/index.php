<?php
    class MaClasse {
        public $attr = 0;
    }
    
    function funcTest(MaClasse $o) {
        $o->attr++;
    }
    
    $obj = new MaClasse();
    $obj->attr = 1;
    
    var_dump($obj->attr);
    
    funcTest($obj);
    
    var_dump($obj->attr);
    
