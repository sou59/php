<?php
    namespace Singleton;

    require 'Vendeur.class.php';

    // affichage du vendeur du système
    function afficherVendeur() {
        $leMemeVendeur = Vendeur::Instance();
        $leMemeVendeur->affiche();
    }
    
    // initialisation du vendeur du système
    function initVendeur() {
        $leVendeur = Vendeur::Instance();
        $leVendeur->setNom("Vendeur Auto");
        $leVendeur->setAdresse("Paris");
        $leVendeur->setEmail("vendeur@vendeur.com");
    }
    
    
    initVendeur();
    afficherVendeur();
