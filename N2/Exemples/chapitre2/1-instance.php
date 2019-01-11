<?php
header('Content-type: text/plain; charset=utf-8'); // Afficher la page sans HTML & en UTF-8

// Initialisation
require("Classes/Personne.php");

// Instanciation
$tabPersonnes[] = new PersonneVrai;
$tabPersonnes[] = new PersonneVrai();

// Modification
$tabPersonnes[0]->modifier("Albert",  "Dupont");
$tabPersonnes[1]->modifier("Jacques", "Dupond");


// Affichage
var_dump($tabPersonnes);
echo $tabPersonnes[1]->afficher();
