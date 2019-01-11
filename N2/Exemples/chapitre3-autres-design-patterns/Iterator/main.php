<?php
namespace Iterator;

require_once 'Catalogue.class.php';
require_once 'Vehicule.class.php';
require_once 'Iterateur.class.php';

$catalogue = new Catalogue();
$catalogue->ajoute(new Vehicule('véhicule bon marché'));
$catalogue->ajoute(new Vehicule('petit véhicule bon marché'));
$catalogue->ajoute(new Vehicule('véhicule grande qualité'));
$iterateur = $catalogue->recherche('bon marché');

$iterateur->debut();
$vehicule = $iterateur->item();
while (isset($vehicule))
{
    $vehicule->affiche();
    $iterateur->suivant();
    $vehicule = $iterateur->item();
}


?>
