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
        
        $db = Db::connect();
        if ($db) {
            $sql = "SELECT dataMax FROM forfaits WHERE libelle = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($nom));
            
            if ($stmt === false || $stmt->errorCode() !== '00000') die("Erreur lors de l'extraction des clients");
            $dataUsed = $stmt->fetchColumn();
            
            return new Forfait($nom, $telephone, $dataUsed);
        }
        
        
        
        trigger_error("Le forfait [$nom] n'existe pas", E_USER_ERROR);
    }
}
