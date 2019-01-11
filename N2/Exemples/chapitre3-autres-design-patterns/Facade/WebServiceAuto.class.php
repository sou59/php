<?php
namespace Facade;

interface WebServiceAuto
{

    /**
     *
     * @param int $index            
     * @return string
     */
    function document($index);

    /**
     *
     * @param int $prixMoyen            
     * @param int $ecartMax            
     * @return "Liste de string"
     */
    function chercheVehicules($prixMoyen, $ecartMax);
}

?>
