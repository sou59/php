<?php
    // Variable globales
    $GLOBALS['ampoulesEtat']    = array();
    $GLOBALS['ampoulesCouleur'] = array();
    
    // Les Accesseurs
    function setAmpouleCouleur($id, $couleur) {
        if (in_array($couleur, array("blanche", "rouge", "orange"))) {
            $GLOBALS['ampoulesCouleur'][$id] = $couleur;
        }
    }
    function getAmpouleCouleur($id) {
        return 'La couleur est : ' . $GLOBALS['ampoulesCouleur'][$id];
    }
    
    // Création de la première ampoule
    setAmpouleCouleur(1, 'Coucou');
    echo getAmpouleCouleur(1);
    
    // Création de la deuxième ampoule
    setAmpouleCouleur(2, 'Deuxième Coucou');
    
    // Erreur : Pas de troisième ampoule
    echo getAmpouleCouleur(3);
    
    // var_dump pour montrer le tableau
    var_dump($GLOBALS['ampoulesCouleur']);