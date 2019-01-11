<?php
namespace Flyweight;

require_once 'FabriqueOption.class.php';
require_once 'VehiculeCommande.class.php';

$fabrique = new FabriqueOption();
$vehicule = new VehiculeCommande();
$vehicule->ajouteOptions('air bag', 80, $fabrique);
$vehicule->ajouteOptions('direction assistée', 90, $fabrique);
$vehicule->ajouteOptions('vitres électriques', 85, $fabrique);
$vehicule->afficheOptions();

?>
