<?php
namespace Facade;

require_once 'WebServiceAuto.class.php';
require_once 'Catalogue.class.php';
require_once 'ComposantCatalogue.class.php';
require_once 'GestionDocument.class.php';
require_once 'ComposantGestionDocument.class.php';

class DescriptionVehicule
{
    protected $description; // string
    protected $prix; // int
    
    /**
     *
     * @param string $description            
     * @param int $prix            
     */
    public function __construct($description, $prix)
    {
        $this->description = $description;
        $this->prix = $prix;
    }

    /**
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }
}

class ComposantCatalogue implements Catalogue
{
    protected $descriptionsVehicule = array();

    public function __construct()
    {
        $this->descriptionsVehicule[] = new DescriptionVehicule(
                'Berline 5 portes', 6000);
        $this->descriptionsVehicule[] = new DescriptionVehicule(
                'Compact 3 portes', 4000);
        $this->descriptionsVehicule[] = new DescriptionVehicule(
                'Espace 5 portes', 8000);
        $this->descriptionsVehicule[] = new DescriptionVehicule(
                'Break 5 portes', 7000);
        $this->descriptionsVehicule[] = new DescriptionVehicule(
                'Coupé 2 portes', 9000);
        $this->descriptionsVehicule[] = new DescriptionVehicule(
                'Utilitaire 3 portes', 5000);
    }

    public function retrouveVehicules($prixMin, $prixMax)
    {
        $resultat = array(); // Liste de string
        foreach ($this->descriptionsVehicule as
            $descriptionVehicule)
        {
            $prix = $descriptionVehicule->getPrix();
            if (($prix >= $prixMin) && ($prix <= $prixMax))
            {
                $resultat[] = 
                  $descriptionVehicule->getDescription();
            }
        }
        return $resultat;
    }
}

?>
