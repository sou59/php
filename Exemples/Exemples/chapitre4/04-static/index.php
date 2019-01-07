<?php
    class MaClasse {
        static protected $count = 0;
     
        public function __construct() {
            self::$count++;
        }
        public function getCount() {
            return self::getStaticCount();
        }
     
        static public function getStaticCount() {
            return self::$count . "<br />\n";
        }
    }
    
    echo MaClasse::getStaticCount();
    
    $obj1 = new MaClasse();
    echo $obj1->getCount();
    
    $obj2 = new MaClasse();
    echo $obj2->getCount();
    
    $obj3 = new MaClasse();
    echo $obj3->getCount();
    
    echo MaClasse::getStaticCount();
    
    echo $obj2->getCount();
