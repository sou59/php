<?php
namespace Prototype;

require_once 'LiasseVierge.class.php';
require_once 'BonDeCommande.class.php';
require_once 'CertificatCession.class.php';
require_once 'DemandeImmatriculation.class.php';
require_once 'LiasseClient.class.php';

// initialisation de la liasse vierge
$liasseVierge = LiasseVierge::Instance();
$liasseVierge->ajoute(new BonDeCommande());
$liasseVierge->ajoute(new CertificatCession());
$liasseVierge->ajoute(new DemandeImmatriculation());
// création d'une nouvelle liasse pour deux clients
$liasseClient1 = new LiasseClient('Martin');
$liasseClient2 = new LiasseClient('Durant');
$liasseClient1->affiche();
$liasseClient2->affiche();

?>
