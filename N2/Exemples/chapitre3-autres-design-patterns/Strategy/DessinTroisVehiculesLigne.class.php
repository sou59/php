<?php
namespace Strategy;

require_once 'DessinCatalogue.class.php';
require_once 'ListeVueVehicule.class.php';
require_once '../Outils.class.php';

class DessinTroisVehiculesLigne implements DessinCatalogue
{

    /**
     * @param ListeVueVehicule $contenu
     */
    public function dessine(ListeVueVehicule $contenu)
    {
        \Outils::println('Dessine les véhicules avec trois '
                . 'véhicules par ligne');
        $compteur = 0;
        foreach ($contenu as $vueVehicule)
        {
            $vueVehicule->dessine();
            $compteur++;
            if ($compteur === 3)
            {
                \Outils::println();
                $compteur = 0;
            }
            else
            {
                \Outils::prt(", ");
            }
        }
        if ($compteur !== 0)
        {
            \Outils::println();
        }
        \Outils::println();
    }
}


?>
