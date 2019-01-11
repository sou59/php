<?php
namespace AbstractFactory;

require_once 'Automobile.class.php';
require_once '../Outils.class.php';

class AutomobileEssence extends Automobile
{

    /**
     *
     * @param string $modele            
     * @param string $couleur            
     * @param int $puissance            
     * @param double $espace            
     */
    public function __construct($modele, $couleur, $puissance, 
            $espace)
    {
        parent::__construct($modele, $couleur, $puissance, 
                $espace);
    }

    public function afficheCaracteristiques()
    {
        $txt = "Automobile à essence de modèle : $this->modele" 
                . ", de couleur : $this->couleur" 
                . ", de puissance : $this->puissance"
                . ", d'espace : $this->espace";
        \Outils::println($txt);
    }
}

?>
