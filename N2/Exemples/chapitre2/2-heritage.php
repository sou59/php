<?php
header('Content-type: text/html; charset=utf-8'); // Afficher la page HTML & en UTF-8

// Initialisation
require("Classes/Personne.php");
require("Classes/Salarie.php");
require("Classes/Client.php");

// Instanciation
$tabPersonnes[0] = new Client;
$tabPersonnes[1] = new Client;
$tabPersonnes[2] = new Salarie("Jacques", "Dupond", 1);

// Modification
$tabPersonnes[0]->modifier("Albert",  "Dupont", 1);
$tabPersonnes[1]->modifier("Simone",  "Dupont", 2);


// Affichage
echo "<pre>";
    var_dump($tabPersonnes);
    
    echo $tabPersonnes[0]->afficher();
    echo "<br />";
    echo "<br />";
    echo $tabPersonnes[1]->afficher();
    echo "<br />";
    echo "<br />";
    echo $tabPersonnes[2]->afficher();

    
    echo "<br />";
    echo "<br />";
    echo $tabPersonnes[2]->embaucher();
    echo "<br />";
    echo "<br />";
    echo $tabPersonnes[2]->virer();
    
echo "</pre>";
