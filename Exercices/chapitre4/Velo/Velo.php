<?php
    class Velo {
        // Définir les attributs
        
        // Définir les comportements
    }
    
    // Instancier deux vélos
    $velo1 = ...;
    $velo2 = ...;
    
    // Construire les vélos
    $velo1->construire(7, 10);
    $velo2->construire(6, -1);
    
    // Appliquer des comportements de changements de roues
    $velo1->ajouter_2_roues();
    $velo1->ajouter_2_roues();
    $velo2->retirer_2_roues();
    
    // Vérifier que les comportements correspondent aux règles
    var_dump($velo1); // DOIT avoir : 4 roues / 5, 6 ou 8 vitesses / 10 en taille de roue
    var_dump($velo2); // DOIT avoir : 2 roues / 6 viteses / une taille de roue positive
