<?php
class Client {
    protected $params   = array();
    protected $forfaits = array();
    
    /**
     * Créer un nouveau client
     * 
     * @param String $civilite Civilité ou Gentillé
     * @param String $prenom   Prénom du client
     * @param String $nom      Nom du client
     */
    function __construct($civilite, $prenom, $nom) {
        $this->params['civilite'] = $civilite;
        $this->params['prenom']   = $prenom;
        $this->params['nom']      = $nom;
    }
 
    /**
     * Ajouter une nouvelle ligne téléphonique avec le forfait associé
     *
     * @todo Vérifier que le numéro de téléphone n'existe pas déjà
     * 
     * @param Telephone $numero  Objet correspondant à un téléphone
     * @param Forfait   $forfait Objet correspondant à un forfait
     * 
     * @return Object    Moi-même
     */
    function ajouterForfait(Forfait $forfait) {
        $this->forfaits[] = $forfait;
        return $this;
    }
    
    /**
     * Récupérer la liste des forfaits
     * 
     * @return Forfaits[]    Liste des forfaits
     */
    function getAllForfaits() {
        return $this->forfaits;
    }
    
    //function utiliserData($numLigne, $qty) {
    //      return $this->lignes["$numLigne"]->utiliserData($qty);
    //}
    
    /**
     * Afficher les informations natives du client (celles obligatoires)
     * 
     * @return String    HTML ( Civilité Prénom Nom )
     */
    function getHtmlFullName() {
        return <<<"EOT"
            <span style=''>{$this->params['civilite']}</span>
            <span style='text-transform:capitalize;'>{$this->params['prenom']}</span>
            <span style='text-transform:capitalize;font-variant:small-caps;'>{$this->params['nom']}</span>
EOT;
    }
    
    /**
     * Affiher les informations natives du client (celles obligatoires)
     * 
     * @alias getHtmlFullName()
     * 
     * @return String    HTML ( Civilité Prénom Nom )
     */
    function __toString() {
        return $this->getHtmlFullName();
    }
    
    /**
     * Sauvegarder le client
     */
    function save() {
        var_dump(serialize($this));
    }
    
    /**
     * Méthode statique (Liée à aucun objet Client en particulier), nous permet
     *  d'avoir une méthode pour charger tous les clients stocké dans un CSV
     * 
     * @return Array    Tableau de clients
     */
    static function loadAll() {
        $tabClients = array();
        
        return $tabClients;
    }
}

