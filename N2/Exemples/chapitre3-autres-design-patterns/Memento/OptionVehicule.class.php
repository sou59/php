<?php
namespace Memento;

require_once '../Outils.class.php';

class OptionVehicule
{
    /**
     * 
     * @var string
     */
    protected $nom;
    /**
     * @var ListeOptionVehicule
     */
    protected $optionsIncompatibles;

    /**
     * 
     * @param string $nom
     */
    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->optionsIncompatibles = new ListeOptionVehicule();
    }

    /**
     * 
     * @param OptionVehicule $optionIncompatible
     */
    public function ajouteOptionIncompatible(OptionVehicule
            $optionIncompatible)
    {
        if (!$this->optionsIncompatibles
              ->contains($optionIncompatible))
        {
            $this->optionsIncompatibles
             ->add($optionIncompatible);
            $optionIncompatible->ajouteOptionIncompatible($this);
        }
    }

    /**
     * @return ListeOptionVehicule
     */
    public function getOptionsIncompatibles()
    {
        return $this->optionsIncompatibles;
    }

    /**
     * @return void
     */
    public function affiche()
    {
        \Outils::println("option : $this->nom");
    }
}


?>
