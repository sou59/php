<?php
namespace ChainOfResponsibility;

require_once '../Outils.class.php';
require_once 'Vehicule.class.php';
require_once 'Modele.class.php';
require_once 'Marque.class.php';

$vehicule1 = new Vehicule(
        'Auto++ KT500 Véhicule d\'occasion en bon état ');
\Outils::println($vehicule1->donneDescription());

$modele1 = new Modele('KT400', 
        'Le véhicule est spacieux et confortable');
        
$vehicule2 = new Vehicule();
$vehicule2->setSuivant($modele1);

\Outils::println($vehicule2->donneDescription());

$marque1 = new Marque('Auto++', 'La marque des autos', 
        'de grande qualité');
        
$modele2 = new Modele('KT700');
$modele2->setSuivant($marque1);

$vehicule3 = new Vehicule();
$vehicule3->setSuivant($modele2);

\Outils::println($vehicule3->donneDescription());

$vehicule4 = new Vehicule();
\Outils::println($vehicule4->donneDescription());

?>
