<?php
namespace Iterator;

require_once '..\Outils.class.php';
require_once 'Element.class.php';

class Vehicule extends Element
{
    /**
     * 
     * @param string $description
     */
    public function __construct($description)
    {
        parent::__construct($description);
    }

    public function affiche()
    {
        \Outils::println(
                "Description du véhicule : $this->description");
    }
}
?>
