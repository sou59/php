<?php
namespace Builder;

abstract class ConstructeurLiasseVehicule
{
    /**
     * 
     * @var Liasse
     */
    protected $liasse;
    
    /**
     *
     * @param string $nomClient            
     */
    public abstract function construitBonDeCommande($nomClient);

    /**
     *
     * @param string $nomDemandeur            
     */
    public abstract function construitDemandeImmatriculation(
            $nomDemandeur);

    /**
     *
     * @return Liasse
     */
    public function resultat()
    {
        return $this->liasse;
    }
}

?>
