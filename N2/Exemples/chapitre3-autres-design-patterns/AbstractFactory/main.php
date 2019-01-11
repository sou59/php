<?php
namespace AbstractFactory;

require_once '../Outils.class.php';
require_once 'FabriqueVehiculeElectricite.class.php';
require_once 'FabriqueVehiculeEssence.class.php';

define('NBR_AUTOS', 3);
define('NB_SCOOTERS', 2);

$autos = array();
$scooters = array();

$choix = \Outils::readln(
        'Voulez-vous utiliser des véhicules électriques (1) ou' .
                 ' à essence (2) : ');
if ($choix == '1')
{
    $fabrique = new FabriqueVehiculeElectricite();
}
else
{
    $fabrique = new FabriqueVehiculeEssence();
}

for ($index = 0; $index < NBR_AUTOS; $index ++)
{
    $autos[$index] = $fabrique->creeAutomobile('standard', 
            'jaune', 6 + $index, 3.2);
}
for ($index = 0; $index < NB_SCOOTERS; $index ++)
{
    $scooters[$index] = $fabrique->creeScooter('classic', 
            'rouge', 2 + $index);
}

foreach ($autos as $auto)
{
    $auto->afficheCaracteristiques();
}
foreach ($scooters as $scooter)
{
    $scooter->afficheCaracteristiques();
}

?>
