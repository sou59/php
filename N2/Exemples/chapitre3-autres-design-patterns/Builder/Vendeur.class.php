<?php
namespace Builder;

require_once 'ConstructeurLiasseVehicule.class.php';

class Vendeur
{
    /**
     * 
     * @var ConstructeurLiasseVehicule
     */
    protected $constructeur;
    
    /**
     *
     * @param ConstructeurLiasseVehicule $constructeur            
     */
    public function __construct(ConstructeurLiasseVehicule $constructeur)
    {
        $this->constructeur = $constructeur;
    }

    /**
     *
     * @param string $nomClient            
     * @return Liasse
     */
    public function construit($nomClient)
    {
        $this->constructeur->construitBonDeCommande($nomClient);
        $this->constructeur->construitDemandeImmatriculation(
                $nomClient);
        return $this->constructeur->resultat();
    }
}

?>
