<?php
namespace Facade;

interface Catalogue
{

    /**
     *
     * @param int $prixMin            
     * @param int $prixMax            
     * @return "Liste de string"
     */
    function retrouveVehicules($prixMin, $prixMax);
}

?>
