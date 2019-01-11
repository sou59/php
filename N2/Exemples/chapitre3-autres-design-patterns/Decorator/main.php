<?php
namespace Decorator;

require_once '../Outils.class.php';
require_once 'VueVehicule.class.php';
require_once 'ModeleDecorateur.class.php';
require_once 'MarqueDecorateur.class.php';

$vueVehicule = new VueVehicule();
$modeleDecorateur = new ModeleDecorateur($vueVehicule);
$marqueDecorateur = new MarqueDecorateur($modeleDecorateur);
$marqueDecorateur->affiche();

?>
