<?php
namespace Strategy;

require_once 'DessinCatalogue.class.php';
require_once 'ListeVueVehicule.class.php';
require_once '../Outils.class.php';

class DessinUnVehiculeLigne implements DessinCatalogue
{

    /**
     * 
     * @param ListeVueVehicule $contenu
     */
    public function dessine(ListeVueVehicule $contenu)
    {
        \Outils::println(
            'Dessine les véhicules avec un véhicule par ligne');
        foreach ($contenu as $vueVehicule)
        {
            $vueVehicule->dessine();
            \Outils::println();
        }
        \Outils::println();
    }
}


?>
