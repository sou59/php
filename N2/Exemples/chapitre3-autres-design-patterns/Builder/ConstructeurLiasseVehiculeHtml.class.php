<?php
namespace Builder;

require_once 'ConstructeurLiasseVehicule.class.php';
require_once 'LiasseHtml.class.php';

class ConstructeurLiasseVehiculeHtml extends ConstructeurLiasseVehicule
{

    public function __construct()
    {
        $this->liasse = new LiasseHtml();
    }

    public function construitBonDeCommande($nomClient)
    {
        $document = 
            "<HTML>Bon de commande Client : $nomClient</HTML>";
        $this->liasse->ajouteDocument($document);
    }

    public function construitDemandeImmatriculation(
            $nomDemandeur)
    {
        $document = '<HTML>Demande d\'immatriculation ' .
            "Demandeur : $nomDemandeur</HTML>";
        $this->liasse->ajouteDocument($document);
    }
}

?>
