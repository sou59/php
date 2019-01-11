<?php
namespace State;

require_once 'Commande.class.php';
require_once 'Produit.class.php';

$commande = new Commande();
$commande->ajouteProduit(new Produit('véhicule 1'));
$commande->ajouteProduit(new Produit('Accessoire 2'));
$commande->affiche();
$commande->etatSuivant();
$commande->ajouteProduit(new Produit('Accessoire 3'));
$commande->efface();
$commande->affiche();

$commande2 = new Commande();
$commande2->ajouteProduit(new Produit('véhicule 11'));
$commande2->ajouteProduit(new Produit('Accessoire 21'));
$commande2->affiche();
$commande2->etatSuivant();
$commande2->affiche();
$commande2->etatSuivant();
$commande2->efface();
$commande2->affiche();

?>
