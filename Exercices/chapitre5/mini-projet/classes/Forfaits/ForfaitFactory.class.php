<?php


class ForfaitFactory {
    /**
     * La factory va tenter de créer un objet en fonction de paramètre,
     *  utile lorsque le nom du forfait est une chaine stocké
     * 
     * @param String   $nom       Nom du forfai
     * @param Telephone $telephone Objet Téléphone
     * 
     * @return Forfait      Le forfait généré, ou une erreur Fatale
     */
    static function create($nom, Telephone $telephone) {
        $className = "Forfait".ucfirst($nom);
        if (class_exists($className)) {
            return new $className($telephone);
        }
        
        trigger_error("Le forfait [$nom] n'existe pas", E_USER_ERROR);
    }
}
