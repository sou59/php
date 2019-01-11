<?php
namespace FactoryMethod;

abstract class Commande
{
    /**
     * 
     * @var double
     */
    protected $montant;
    
    /**
     *
     * @param double $montant            
     */
    public function __construct($montant)
    {
        $this->montant = $montant;
    }

    /**
     *
     * @return boolean
     */
    public abstract function valide();

    /**
     * @return void
     */
    public abstract function paye();
}
?>
