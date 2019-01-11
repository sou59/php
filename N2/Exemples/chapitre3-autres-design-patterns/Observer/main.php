<?php
namespace Observer;

require_once 'Vehicule.class.php';
require_once 'VueVehicule.class.php';

$vehicule = new Vehicule();
$vehicule->setDescription('Véhicule bon marché');
$vehicule->setPrix(5000.0);

$vueVehicule = new VueVehicule('Observateur 1', $vehicule);
$vueVehicule->redessine();
$vehicule->setPrix(4500.0);

$vueVehicule2 = new VueVehicule('Observateur 2', $vehicule);
$vehicule->setPrix(5500.0);

$vehicule->retire($vueVehicule);
$vehicule->setPrix(6500.0);

?>
