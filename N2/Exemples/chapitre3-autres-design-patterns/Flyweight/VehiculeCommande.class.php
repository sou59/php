<?php
namespace Flyweight;

require_once '../Outils.class.php';
require_once 'FabriqueOption.class.php';

class VehiculeCommande
{
    /**
     * 
     * @var "Liste d'OptionVehicule"
     */
    protected $options = array();
    /**
     * 
     * @var "Liste d'int"
     */
    protected $prixDeVenteOptions = array();
    
    /**
     *
     * @param string $nom            
     * @param int $prixDeVente            
     * @param FabriqueOption $fabrique            
     */
    public function ajouteOptions($nom, $prixDeVente,
                                     FabriqueOption $fabrique)
    {
        $this->options[] = $fabrique->getOption($nom);
        $this->prixDeVenteOptions[] = $prixDeVente;
    }

    
    public function afficheOptions()
    {
        foreach ($this->options as $index => $option)
        {
            $option->affiche($this->prixDeVenteOptions[$index]);
            \Outils::println();
        }
    }
}

?>
