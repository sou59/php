<?php
    class Velo {
        // Définir les attributs
        private $nbr_roue = 2;
        private $vitesse;
        private $taille;

        public function construire($vitesse,$taille) {
            if ($vitesse != 5 || $vitesse != 6 || $vitesse != 8) {
                $this->$vitesse = 5;
            }
            if (!($taille < 0)) {
                $this->$taille;
            }
        }
        public function ajouter_2_roues() {
            if (!($taille >= 2)) {
                return  $taille+=2;
            }
        }
        public function retirer_2_roues() {
            if ($taille > 3) {
                return  $taille-=2;
            }
        }
        public function getInfosVelo() {
            echo "<ul>";
                echo "<li>Vitesse du velo :" .$this->$vitesse. "<li>";
                echo "<li>Nombre de roue :" .$this->$nbr_roue. "<li>";
                echo "<li>Taille des roues :" .$this->$taille. "<li>";
            echo "<ul>";
        }

        // Définir les comportements
    }
    
    // Instancier deux vélos
    $velo1 = new Velo();
    $velo2 = new Velo();
    
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
