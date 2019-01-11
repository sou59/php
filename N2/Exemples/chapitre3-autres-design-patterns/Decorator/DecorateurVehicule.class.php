<?php
namespace Decorator;

require_once 'ComposantGraphiqueVehicule.class.php';

abstract class DecorateurVehicule implements ComposantGraphiqueVehicule
{
    /**
     * 
     * @var ComposantGraphiqueVehicule
     */
    protected $composant;
    
    /**
     *
     * @param ComposantGraphiqueVehicule $composant            
     */
    public function __construct(ComposantGraphiqueVehicule $composant)
    {
        $this->composant = $composant;
    }

    public function affiche()
    {
        $this->composant->affiche();
    }
}
?>
