<?php
header('Content-type: text/html; charset=utf-8'); // Afficher la page HTML & en UTF-8

// Initialisation
require("Classes/Personne.php");
require("Classes/ListePersonnes.php");
require("Classes/Salarie.php");
require("Classes/Client.php");

// Instanciation
$tabPersonnes = new ListePersonnes;
$tabPersonnes->ajouterPersonne( new Salarie("Jacques",  "Dupond", 1) );
$tabPersonnes->ajouterPersonne( new Salarie("Jeannine", "Dupont", 2) );
$tabPersonnes->ajouterPersonne( new Client );

// Affichage
echo "<pre>";
    var_dump($tabPersonnes);

    echo "\n\nParcours de la liste\n--------------------\n";
    $tabPersonnes->rewind();
    while($personne = $tabPersonnes->current()) {
        echo "\n";
        var_dump($personne);
        $tabPersonnes->next();
    };
    
    
    echo "\n\nParcours de la liste (foreach)\n--------------------\n";
    foreach($tabPersonnes as $personne) {
        echo "\n";
        var_dump($personne);
    }
    
    
    echo "\n\nPassage en paramètre\n--------------------\n";
    function gereLesObjetsImplantantCountable(Countable $objet) {
        echo "\n";
        var_dump($objet);
        echo "\n";
        var_dump(count($objet));
    }
    
    gereLesObjetsImplantantCountable(new ListePersonnes);
    gereLesObjetsImplantantCountable(new Client);
    gereLesObjetsImplantantCountable("test");

echo "</pre>";
