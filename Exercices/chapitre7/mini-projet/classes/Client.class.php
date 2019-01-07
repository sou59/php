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
     * Ajouter le client en l'état dans une ligne du fichier CSV
     */
    function save() {
        $db = Db::connect();
        if ($db) {
            // Préparation de la requête d'insertion
            $sql = "INSERT INTO clients
                           (civilite, prenom, nom, codeForfait, telephone, dataUsed)
                    VALUES (:civilite,
                            :prenom,
                            :nom,
                            (SELECT codeForfait FROM forfaits WHERE libelle=:libelleForfait LIMIT 0,1),
                            :telephone,
                            :dataUsed)";
            
            // ... TODO
            die('Cette partie n\'est pas encore codée !');
        }
    }
    
    /**
     * Méthode statique (Liée à aucun objet Client en particulier), nous permet
     *  d'avoir une méthode pour charger tous les clients stocké dans un CSV
     * 
     * @return Array    Tableau de clients
     */
    static function loadAll() {
        $tabClients = array();
        
        $db = Db::connect();
        if ($db) {
            // Récupérer la totalité des clients depuis la table, et le renvoi sous la forme d'un tableau de Clients
            $sql = "SELECT idClient, civilite, prenom, nom, libelle AS libelleForfait, telephone, dataUsed FROM clients LEFT JOIN forfaits USING (codeForfait)";
            $stmt = $db->query($sql);
   
            if ($stmt === false || $stmt->errorCode() !== '00000') die("Erreur lors de l'extraction des clients");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $client = new Client($row['civilite'], $row['prenom'], $row['nom']); // On créer le client
                
                if (isset($row['telephone'])) {
                    $forfait = ForfaitFactory::create($row['libelleForfait'], new Telephone($row['telephone']));
                    if (isset($row['dataUsed'])) {
                        $forfait->utiliserData($row['dataUsed']);
                    }
                    $client->ajouterForfait($forfait);
                }
                
                $tabClients[$row['idClient']] = $client; // On ajoute la référence au tableau, avec le numéro identifiant cet utilisateur
            }
        }
        
        return $tabClients;
    }    
}

