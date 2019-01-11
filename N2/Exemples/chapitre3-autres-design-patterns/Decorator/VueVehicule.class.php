<?php
namespace Decorator;

require_once '../Outils.class.php';
require_once 'ComposantGraphiqueVehicule.class.php';

class VueVehicule implements ComposantGraphiqueVehicule
{

    public function affiche()
    {
        \Outils::println('Affichage du véhicule');
    }
}

?>
