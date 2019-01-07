<?php
    session_start();
    
    // Déconnecter l'utilisateur
    // Astuce : Pour savoir comment déconnecter un utilisateur,
    //          la meilleur méthode est encore de savoir comment il est connecté,
    //          et de retirer ce droit !
    
    
    
    // Renvoyer l'utilisateur vers la page d'Index.
    header('Location: index.php');
    exit();
