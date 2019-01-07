<?php

class Humain {
    public $nom;
}

class Animal {
    public function ronronner() {
        echo "Ronronner<br />\n";
    }
}

class LoupGarou {
    protected $partieAnimale;
    protected $partieHumaine;
    
    function __construct() {
        $this->partieAnimale = new Animal();
        $this->partieHumaine = new Humain();
    }
    
    function actionAnimale() {
        $this->partieAnimale->ronronner();
    }
    
    function setNom($nom) {
        $this->partieHumaine->nom = $nom;
    }
}

$lg = new LoupGarou();
var_dump($lg);
//$lg->nom = 'Jean Michel';   // Pas ok, pas d'héritage
$lg->setNom('Jean Michel'); // Ok, car hérité
//$lg->ronronner();           // Pas ok, pas d'héritage
$lg->actionAnimale();       // Ok, accès grâce à la composition

var_dump($lg);
