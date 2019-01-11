<?php
namespace Strategy;

require_once 'VueCatalogue.class.php';
require_once 'DessinTroisVehiculesLigne.class.php';
require_once 'DessinUnVehiculeLigne.class.php';

$vueCatalogue1 = new VueCatalogue(new DessinTroisVehiculesLigne());
$vueCatalogue1->dessine();

$vueCatalogue2 = new VueCatalogue(new DessinUnVehiculeLigne());
$vueCatalogue2->dessine();

?>
