<?php
namespace Composite;

require_once '../Outils.class.php';
require_once 'SocieteSansFiliale.class.php';
require_once 'SocieteMere.class.php';

$societe1 = new SocieteSansFiliale();
$societe1->ajouteVehicule();

$societe2 = new SocieteSansFiliale();
$societe2->ajouteVehicule();
$societe2->ajouteVehicule();

$groupe = new SocieteMere();
$groupe->ajouteFiliale($societe1);
$groupe->ajouteFiliale($societe2);
$groupe->ajouteVehicule();

\Outils::println(
        ' Coût d\'entretien total du groupe : ' .
         number_format($groupe->calculeCoutEntretien(), 
                    2, ',', ' '));

?>
