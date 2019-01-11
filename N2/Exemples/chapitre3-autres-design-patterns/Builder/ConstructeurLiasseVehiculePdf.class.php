<?php
namespace Builder;

require_once 'ConstructeurLiasseVehicule.class.php';
require_once 'LiassePdf.class.php';

class ConstructeurLiasseVehiculePdf extends ConstructeurLiasseVehicule
{

    public function __construct()
    {
        $this->liasse = new LiassePdf();
    }

    public function construitBonDeCommande($nomClient)
    {
        $document = 
            "<PDF>Bon de commande Client : $nomClient</PDF>";
        $this->liasse->ajouteDocument($document);
    }

    public function construitDemandeImmatriculation(
            $nomDemandeur)
    {
        $document = '<PDF>Demande d\'immatriculation ' .
            "Demandeur : $nomDemandeur</PDF>";
        $this->liasse->ajouteDocument($document);
    }
}

?>
