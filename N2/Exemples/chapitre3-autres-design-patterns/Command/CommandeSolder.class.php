<?php
namespace Command;

require_once 'ListeVehicule.class.php';

class CommandeSolder
{
    /**
     * 
     * @var ListeVehicule
     */
    protected $vehiculesSoldes;
    /**
     * 
     * @var long
     */
    protected $aujourdhui; 
    /**
     * 
     * @var long
     */
    protected $dureeStock; 
    /**
     * 
     * @var double
     */
    protected $tauxRemise;
    
    /**
     *
     * @param long $aujourdhui            
     * @param long $dureeStock            
     * @param double $tauxRemise            
     */
    public function __construct($aujourdhui, $dureeStock, 
            $tauxRemise)
    {
        $this->vehiculesSoldes = new ListeVehicule();
        $this->aujourdhui = $aujourdhui;
        $this->dureeStock = $dureeStock;
        $this->tauxRemise = $tauxRemise;
    }

    /**
     *
     * @param ListeVehicule $vehicules
     */
    public function solde(ListeVehicule $vehicules)
    {
        $this->vehiculesSoldes = new ListeVehicule();
        foreach ($vehicules as $vehicule)
        {
            if ($vehicule->getDureeStockage($this->aujourdhui) >=
                     $this->dureeStock)
            {
                $this->vehiculesSoldes->append($vehicule);
            }
        }
        foreach ($this->vehiculesSoldes as $vehicule)
        {
            $vehicule->modifiePrix(1.0 - $this->tauxRemise);
        }
    }

    public function annule()
    {
        foreach ($this->vehiculesSoldes as $vehicule)
        {
            $vehicule->modifiePrix(
                    1.0 / (1.0 - $this->tauxRemise));
        }
    }

    public function retablit()
    {
        foreach ($this->vehiculesSoldes as $vehicule)
        {
            $vehicule->modifiePrix(1.0 - $this->tauxRemise);
        }
    }
}

?>
