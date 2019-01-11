<?php
namespace Command;

require_once '../Outils.class.php';
require_once 'Vehicule.class.php';
require_once 'Catalogue.class.php';
require_once 'CommandeSolder.class.php';

$vehicule1 = new Vehicule('A01', 1, 1000.0);
$vehicule2 = new Vehicule('A11', 6, 2000.0);
$vehicule3 = new Vehicule('Z03', 2, 3000.0);

$catalogue = new Catalogue();
$catalogue->ajoute($vehicule1);
$catalogue->ajoute($vehicule2);
$catalogue->ajoute($vehicule3);

\Outils::println('Affichage du catalogue initial');
$catalogue->affiche();
\Outils::println();

$commmandeSolder = new CommandeSolder(10, 5, 0.1);
$catalogue->lanceCommandeSolder($commmandeSolder);
\Outils::println(
        'Affichage du catalogue après exécution de la première commande');
$catalogue->affiche();
\Outils::println();

$commmandeSolder2 = new CommandeSolder(10, 5, 0.5);
$catalogue->lanceCommandeSolder($commmandeSolder2);
\Outils::println(
        'Affichage du catalogue après exécution de la seconde commande');
$catalogue->affiche();
\Outils::println();

$catalogue->annuleCommandeSolder(1);
\Outils::println(
        'Affichage du catalogue après annulation de la première commande');
$catalogue->affiche();
\Outils::println();

$catalogue->retablitCommandeSolder(1);
\Outils::println(
        'Affichage du catalogue après rétablissement de la première commande');
$catalogue->affiche();
\Outils::println();

?>
