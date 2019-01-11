<?php
namespace AbstractFactory;

interface FabriqueVehicule
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
            $espace);

    /**
     *
     * @param string $modele            
     * @param string $couleur            
     * @param int $puissance            
     * @return Scooter
     */
    public function creeScooter($modele, $couleur, $puissance);
}

?>
