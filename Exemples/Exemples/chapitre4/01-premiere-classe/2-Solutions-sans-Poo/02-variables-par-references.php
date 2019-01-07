<?php
    function ampouleCreate() {
        return array('etat' => 'eteint', 'couleur' => 'blanche');
    }
    
    function ampouleSetColor(&$ampoule, $couleur) {
        if (in_array($couleur, array("blanche", "rouge", "orange"))) {
            $ampoule['couleur'] = $couleur;
        }
    }
    function ampouleGetColor($ampoule) {
       return 'La couleur est : ' . $ampoule['couleur'];
    }
    
    // Création de 2 ampoules
    $ampoule1 = ampouleCreate();
    $ampoule2 = ampouleCreate();
    
    // Appel des fonctions, en donnant la référence sur l'ampoule
    ampouleSetColor($ampoule1, 'Coucou');
    echo ampouleGetColor($ampoule2);
    
    var_dump($ampoule1);
    $ampoule1['couleur'] = 'jaune';
    var_dump($ampoule1);
    