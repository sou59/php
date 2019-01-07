<?php
class Ampoule {
  private $etat    = 'eteint';
  private $couleur = 'blanche';
  
    public function changerCouleur($nouvelleCouleur) {
        // Si la couleur fait partie de la liste des couleurs autorisés.
        if (in_array($nouvelleCouleur, array("blanche", "rouge", "orange"))) {
            $this->couleur = $nouvelleCouleur;
        }
    }
    public function recupererCouleur() {
        return 'La couleur est : '.$this->couleur;
    }
  
    public function allumer() {
        $this->etat = 'allumé';
    }
    public function eteindre() {
        $this->etat = 'eteint';
    }
}
