<?php
namespace Memento;

require_once 'OptionVehicule.class.php';
require_once 'ChariotOption.class.php';

$option1 = new OptionVehicule('Sièges en cuir');
$option2 = new OptionVehicule('Accoudoirs');
$option3 = new OptionVehicule('Sièges sportifs');
$option1->ajouteOptionIncompatible($option3);
$option2->ajouteOptionIncompatible($option3);

$chariotOptions = new ChariotOption();
$chariotOptions->ajouteOption($option1);
$chariotOptions->ajouteOption($option2);
$chariotOptions->affiche();

$memento = $chariotOptions->ajouteOption($option3);
$chariotOptions->affiche();
$chariotOptions->annule($memento);
$chariotOptions->affiche();

?>
