<?php
    class MaClasse {
       public    $attrPublic;
       private   $attrPrive;
       protected $attrProtege;
    
       private function fonctionPrive($param) {
          $this->attrPrive = $param;
       }
      
       public function fonctionPublic($param) {
          $this->fonctionPrive($param);
       }
    }

    $instance = new MaClasse();
    $instance->attrPublic = 'Coucou';
    
    //$instance->attrPrive   = 'Coucou'; // Erreur fatale
    //$instance->attrProtege = 'Coucou'; // Erreur fatale, voir le chapitre sur les héritages
    
    //$instance->fonctionPrive('Coucou'); // Erreur fatale
    $instance->fonctionPublic('Coucou');
    
    var_dump($instance);
