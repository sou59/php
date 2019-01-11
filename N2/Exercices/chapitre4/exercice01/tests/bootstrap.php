<?php
    // Permet d'informer quand PHPUNIT est en cours
    if (!defined("DEBUG_PHPUNIT")) {
        define("DEBUG_PHPUNIT", true);
    }
    
    // Définir le chemin du projet
    if (!defined('APP_ROOT')) {
        define('APP_ROOT', realpath(__DIR__ . '/..'));
    }
    chdir(APP_ROOT . '/public'); // Modifier le dossier courant pour simuler au plus proche la présence dans l'application
    
    // Pour pouvoir tester la boite à outil
    require(APP_ROOT . '/src/App/BoiteAOutils.php');