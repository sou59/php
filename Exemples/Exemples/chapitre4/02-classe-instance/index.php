<?php
class MaClasse {
    public $attr = 'Coucou';
   
    public function faireChose() {
        echo $this->attr, "<br />\n";
    }
}

//MaClasse->attr = 'Test';  // Erreur car maClasse est une Classe...
//MaClasse->faireChose();  // … nous avons besoin d'une instance.

$obj = new MaClasse(); // $obj est un Objet instancié de la classe maClasse...
var_dump($obj instanceof MaClasse); // … comme le prouve ce test

$obj->attr = 'Test Coucou';
$obj->faireChose(); // Affiche 'Test Coucou'

$obj2 = new MaClasse();
$obj2->faireChose(); // Affiche ?
