<?php
namespace AbstractFactory;

require_once 'Scooter.class.php';
require_once '../Outils.class.php';

class ScooterEssence extends Scooter
{

    /**
     *
     * @param string $modele            
     * @param string $couleur            
     * @param int $puissance            
     */
    public function __construct($modele, $couleur, $puissance)
    {
        parent::__construct($modele, $couleur, $puissance);
    }

    public function afficheCaracteristiques()
    {
        $txt = "Scooter à essence de modèle : $this->modele" .
                 ", de couleur : $this->couleur" .
                 ", de puissance : $this->puissance";
        \Outils::println($txt);
    }
}

?>
