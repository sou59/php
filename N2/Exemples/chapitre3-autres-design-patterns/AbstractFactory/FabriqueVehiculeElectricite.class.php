<?php
namespace AbstractFactory;

require_once 'FabriqueVehicule.class.php';
require_once 'AutomobileElectricite.class.php';
require_once 'ScooterElectricite.class.php';

class FabriqueVehiculeElectricite implements FabriqueVehicule
{

    /**
     *
     * @param string $modele            
     * @param string $couleur            
     * @param int $puissance            
     * @param double $espace            
     * @return Automobile
     */
    public function creeAutomobile($modele, $couleur, $puissance, 
            $espace)
    {
        return new AutomobileElectricite($modele, $couleur, 
                $puissance, $espace);
    }

    /**
     *
     * @param string $modele            
     * @param string $couleur            
     * @param int $puissance            
     * @return Scooter
     */
    public function creeScooter($modele, $couleur, $puissance)
    {
        return new ScooterElectricite($modele, $couleur, 
                $puissance);
    }
}

?>
