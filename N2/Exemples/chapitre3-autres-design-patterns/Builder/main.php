<?php
namespace Builder;

require_once '../Outils.class.php';
require_once 'ConstructeurLiasseVehiculeHtml.class.php';
require_once 'ConstructeurLiasseVehiculePdf.class.php';
require_once 'Vendeur.class.php';

$choix = \Outils::readln(
        'Voulez-vous construire des liasses HTML (1) ou PDF (2) : ');
if ($choix == '1')
{
    $constructeur = new ConstructeurLiasseVehiculeHtml();
}
else
{
    $constructeur = new ConstructeurLiasseVehiculePdf();
}

$vendeur = new Vendeur($constructeur);
$liasse = $vendeur->construit('Martin');
$liasse->imprime();

?>
