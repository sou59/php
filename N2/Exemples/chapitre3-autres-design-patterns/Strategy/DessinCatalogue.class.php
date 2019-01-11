<?php
namespace Strategy;

require_once 'ListeVueVehicule.class.php';

interface DessinCatalogue
{
    /**
     * 
     * @param ListeVueVehicule $contenu
     */
    function dessine(ListeVueVehicule $contenu);
}


?>
