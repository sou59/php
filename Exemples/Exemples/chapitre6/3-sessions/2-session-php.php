<?php

    session_start(); // À lancer dès que possible !!
    
    if ( !empty($_SESSION['step']) ) {
        $step = ++$_SESSION['step']; // Pré-incrémentation
    } else {
        $step = $_SESSION['step'] = 1;
    }
    
    echo '&Eacute;tape '.$step. PHP_EOL;
    echo '<a href="?">Passer &agrave; l\'&eacute;tape suivante</a>';
