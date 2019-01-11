<?php
namespace AbstractFactory;

require_once 'FabriqueVehicule.class.php';
require_once 'AutomobileEssence.class.php';
require_once 'ScooterEssence.class.php';

class FabriqueVehiculeEssence implements FabriqueVehicule
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
        return new AutomobileEssence($modele, $couleur, 
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
        return new ScooterEssence($modele, $couleur, $puissance);
    }
}

?>
