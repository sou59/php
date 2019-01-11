<?php
namespace Composite;

require_once 'Societe.class.php';

class SocieteMere extends Societe
{
    /**
     * 
     * @var "Liste de Societe"
     */
    protected $filiales = array();
    
    public function ajouteFiliale(Societe $filiale)
    {
        $this->filiales[] = $filiale;
        return true; 
    }

    public function calculeCoutEntretien()
    {
        $cout = 0.0;
        foreach ($this->filiales as $filiale)
        {
            $cout += $filiale->calculeCoutEntretien();
        }
        return $cout + $this->nbrVehicules *
                 SocieteMere::$coutUnitVehicule;
    }
}

?>
