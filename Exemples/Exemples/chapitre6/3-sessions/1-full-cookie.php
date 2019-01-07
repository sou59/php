<?php
    // Si le cookie nous est déjà fournis par le navigateur
    if (empty($_COOKIE['idCook'])) {
        $_COOKIE['idCook'] = mt_rand(); // Générer une valeur aléatoire
        setcookie('idCook', $_COOKIE['idCook']);
    }
    
    // On stock le cookie dans $idCook (que le cookie existait déjà, ou vient tous juste d'être affecté)
    $idCook = $_COOKIE['idCook'];
    
    // On vérifie que l'on ais un fichier correspondant à la valeur de notre cookie.
    if (file_exists("tmp-$idCook.data")) {
        // Si oui, on prend la valeur +1, contenu dans le fichier
        $step = file_get_contents("tmp-$idCook.data") +1;
    } else {
        // Si non, on initialise le compteur à 1
        $step = 1;
    }
    
    // Dans tous les cas, on modifie/créer le fichier correspondant à la valeur de notre cookie, avec la valeur de $step
    file_put_contents("tmp-$idCook.data", $step);
    
    // On affiche le tout.
    echo '&Eacute;tape '.$step. PHP_EOL;
    echo '<a href="?">Passer &agrave; l\'&eacute;tape suivante</a>';
