<?php
namespace Memento;

require_once '../Outils.class.php';
require_once 'OptionVehicule.class.php';
require_once 'Memento.class.php';
require_once 'MementoImpl.class.php';

class ChariotOption
{
    /**
     * @var ListeOptionVehicule
     */
    protected $options;

    public function __construct()
    {
        $this->options = new ListeOptionVehicule();
    }
    
    /**
     * 
     * @param OptionVehicule $optionVehicule
     * @return Memento
     */
    public function ajouteOption(OptionVehicule
            $optionVehicule)
    {
        $resultat = new MementoImpl();
        $resultat->setEtat($this->options);
        $this->options->removeAll(
         $optionVehicule->getOptionsIncompatibles());
        $this->options->add($optionVehicule);
        return $resultat;
    }

    /**
     * 
     * @param Memento $memento
     */
    public function annule(Memento $memento)
    {
        if (method_exists($memento, 'getEtat')) {
            $this->options = $memento->getEtat();
        }
    }

    /**
     * @return void
     */
    public function affiche()
    {
        \Outils::println('Contenu du chariot des options');
        foreach ($this->options as $option) {
            $option->affiche();
        }
        \Outils::println();
    }
}

?>
