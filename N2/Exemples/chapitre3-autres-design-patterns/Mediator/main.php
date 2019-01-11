<?php
namespace Mediator;

require_once 'Formulaire.class.php';
require_once 'ZoneSaisie.class.php';
require_once 'PopupMenu.class.php';
require_once 'Bouton.class.php';

$formulaire = new Formulaire();
$formulaire->ajouteControle(new ZoneSaisie('Nom'));
$formulaire->ajouteControle(new ZoneSaisie('Prénom'));

$menu = new PopupMenu('Coemprunteur');
$menu->ajouteOption('sans coemprunteur');
$menu->ajouteOption('avec coemprunteur');

$formulaire->ajouteControle($menu);
$formulaire->setMenuCoemprunteur($menu);

$bouton = new Bouton('Valider');
$formulaire->ajouteControle($bouton);
$formulaire->setBoutonOK($bouton);

$formulaire->ajouteControleCoemprunteur(
        new ZoneSaisie('Nom du coemprunteur'));
$formulaire->ajouteControleCoemprunteur(
        new ZoneSaisie('Prénom du coemprunteur'));
        
$formulaire->saisie();

?>
