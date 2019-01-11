<?php
namespace Composite;

require_once 'Societe.class.php';

class SocieteSansFiliale extends Societe
{

    public function ajouteFiliale(Societe $filiale)
    {
        return false;
    }

    public function calculeCoutEntretien()
    {
        return $this->nbrVehicules *
                 SocieteSansFiliale::$coutUnitVehicule;
    }
}

?>
