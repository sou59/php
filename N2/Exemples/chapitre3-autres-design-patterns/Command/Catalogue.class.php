<?php
namespace Command;

require_once 'ListeVehicule.class.php';

class Catalogue
{
    /**
     * 
     * @var ListeVehicule
     */
    protected $vehiculesStock;
    /**
     * 
     * @var "Liste de CommandeSolder"
     */
    protected $commandes = array();
    
    public function __construct() {
        $this->vehiculesStock = new ListeVehicule();
    }
    
    /**
     *
     * @param CommandeSolder $commande            
     */
    public function lanceCommandeSolder(CommandeSolder $commande)
    {
        array_unshift($this->commandes, $commande); 
        $commande->solde($this->vehiculesStock);
    }

    /**
     *
     * @param int $ordre            
     */
    public function annuleCommandeSolder($ordre)
    {
        $this->commandes[$ordre]->annule();
    }

    /**
     *
     * @param int $ordre            
     */
    public function retablitCommandeSolder($ordre)
    {
        $this->commandes[$ordre]->retablit();
    }

    /**
     *
     * @param Vehicule $vehicule            
     */
    public function ajoute(Vehicule $vehicule)
    {
        $this->vehiculesStock->append($vehicule);
    }

    public function affiche()
    {
        foreach ($this->vehiculesStock as $vehicule)
        {
            $vehicule->affiche();
        }
    }
}

?>
