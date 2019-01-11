<?php
    class Velo {
        // Définir les attributs
        protected $nbr_roue = 2;
        protected $nbr_vitesse;
        protected $taille_roue;

        // Définir les comportements
        public function __construct(int $vitesse, int $taille) {
            // Nombre de vitesse à 5, 6 ou 8 ; sinon 5 par défaut
            if (in_array($vitesse, array(5, 6, 8))) {
                $this->nbr_vitesse = (int) $vitesse;
            } else {
                $this->nbr_vitesse = 5;
            }
            
            // Taille positive ou forcé à 10
            $this->taille_roue = ($taille >= 0 ? $taille : 10);
        }
        public function ajouter_2_roues() {
            if ($this->nbr_roue == 2) {
                $this->nbr_roue+=2;
            }
        }
        public function retirer_2_roues() {
            if ($this->nbr_roue == 4) {
                $this->nbr_roue-=2;
            }
        }
        public function getInformationsVelo() {
            return "Mon Vélo:<br/>
                * Nombre de roue :    {$this->nbr_roue}<br />
                * Nombre de vitesse : {$this->nbr_vitesse}<br />
                * Taille des roues :  {$this->taille_roue}<br />
            ";
        }
    }
    
    // Instancier deux vélos
    $velo1 = new Velo(8, 8);
    $velo2 = new Velo(7, -1);
    
    // Appeler les comportements
//    $velo1->construire(8, 8);
    $velo1->ajouter_2_roues();
    $velo1->ajouter_2_roues();
    
//    $velo2->construire(7, -1);
    $velo2->retirer_2_roues();
    $velo2->ajouter_2_roues();
    
    var_dump($velo1);
    var_dump($velo2);
    
    var_dump($velo1->getInformationsVelo());