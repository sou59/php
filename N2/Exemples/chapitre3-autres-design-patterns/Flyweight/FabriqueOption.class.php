<?php
namespace Flyweight;

require_once '../Outils.class.php';
require_once 'OptionVehicule.class.php';

class FabriqueOption
{
    /**
     * 
     * @var "array string, OptionVehicule"
     */
    protected $options = array();
    
    /**
     *
     * @param string $nom            
     * @return OptionVehicule
     */
    public function getOption($nom)
    {
        if (array_key_exists($nom, $this->options))
        {
            $resultat = $this->options[$nom];
        }
        else
        {
            $resultat = new OptionVehicule($nom);
            $this->options[$nom] = $resultat;
        }
        return $resultat;
    }
}

?>
