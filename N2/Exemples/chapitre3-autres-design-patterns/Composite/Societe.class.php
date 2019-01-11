<?php
namespace Composite;

abstract class Societe
{
    /**
     * 
     * @var double
     */
    protected static $coutUnitVehicule = 5.0;
    /**
     * 
     * @var int
     */
    protected $nbrVehicules;
    
    public function ajouteVehicule()
    {
        $this->nbrVehicules++;
    }

    /**
     *
     * @return double
     */
    public abstract function calculeCoutEntretien();

    /**
     *
     * @param Societe $filiale            
     * @return boolean
     */
    public abstract function ajouteFiliale(Societe $filiale);
}

?>
