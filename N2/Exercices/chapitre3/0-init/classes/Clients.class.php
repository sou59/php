<?php
class Clients {
	private $_params = array();
	private $_lignes = array();
	const _CSV_FILE = 'models/clients.csv';

	function __construct($civilite, $prenom, $nom) {
		$this->_params['civilite'] = $civilite;
		$this->_params['prenom']   = $prenom;
		$this->_params['nom']      = $nom;
	}

	function ajouterLigne($numero, $forfait) {
		$className = "Forfait".ucfirst($forfait);
		$this->_lignes["$numero"] = new $className();
		return $this;
	}
	
	function getLignes() {
		return $this->_lignes;
	}
	
	function utiliserData($numLigne, $qty) {
	      return $this->_lignes["$numLigne"]->utiliserData($qty);
	}
	
	function getFullName() {
   	return <<<"EOT"
		<span style=''>{$this->_params['civilite']}</span>
		<span style='text-transform:capitalize;'>{$this->_params['prenom']}</span>
		<span style='text-transform:capitalize;font-variant:small-caps;'>{$this->_params['nom']}</span>
EOT;
	}
	
	function testUserAndPass($username, $userpass) {
		if (strtolower($username) == strtolower($this->_params['prenom'])
		 && strtolower($userpass) == strtolower($this->_params['nom'])) {
			return true;
		} else {
			return false;
		}
	}
	
	
	// Gére la persistance des données
	/*
	private function createCsvFile() {
		if (!file_exists(self::_CSV_FILE)) {
			$handle = fopen(self::_CSV_FILE, 'w');
			fputcsv($handle, array('Civilité', 'Prénom', 'Nom', 'Forfait', 'Téléphone', 'Données utilisés (o)'));
			fclose($handle);
		}
	}
	*/
	function save() {
		/* CSV-WAY
			// Préparation des multi-lignes
			foreach ($this->_lignes as $tel => $forfait):
				$lignes['telephone'][] = $tel;
				$lignes['forfait'][]   = $forfait->getForfaitName();
				$lignes['data_used'][] = $forfait->getDataUsedOctet();
			endforeach;
			
			// Sauvegarde dans le CSV
			$this->createCsvFile();
			$handle = fopen(self::_CSV_FILE, 'a');
			fputcsv($handle, array($this->_params['civilite']
					    , $this->_params['prenom']
					    , $this->_params['nom']
					    , implode(',', $lignes['telephone'])
					    , implode(',', $lignes['forfait'])
					    , implode(',', $lignes['data_used'])
				));
			fclose($handle);
		*/
		$db = $GLOBALS['BAO']->getDb();
		if ($db) {
			// Récupérer la totalité des clients depuis la table, et le renvoi sous la forme d'un tableau de Clients
			$sql = "INSERT INTO clients (civilite, prenom, nom, codeForfait, telephone, dataUsed) VALUES (:civilite, :prenom, :nom, (SELECT codeForfait FROM forfaits WHERE libelle=:libelleForfait LIMIT 0,1), :telephone, :dataUsed)";
			$stmt = $db->prepare($sql);
			
			$sqlParams['civilite'] = $this->_params['civilite'];
			$sqlParams['prenom']   = $this->_params['prenom'];
			$sqlParams['nom']      = $this->_params['nom'];
			
			if (count($this->_lignes) > 0) {
				reset($this->_lignes); // Gestion mono-ligne dans la Bdd, on ne prend que la première
				list($tel, $forfait) = each ($this->_lignes);
				$sqlParams['libelleForfait'] = $forfait->getForfaitName();
				$sqlParams['telephone']    = $tel;
				$sqlParams['dataUsed']     = $forfait->getDataUsedOctet();
			} else {
				$sqlParams['libelleForfait'] = null;
				$sqlParams['telephone']    = null;
				$sqlParams['dataUsed']     = null;
			}
			
			$stmt->execute($sqlParams);
			
			if ($stmt->errorCode() !== '00000') die("Erreur lors de l'insertion du client dans la bdd");
		}
	}
	
	static function load(&$tabClients) {
		if (file_exists(self::_CSV_FILE)) {
			// Récupérer la totalité des clients depuis le _CSV_FILE, et le renvoi sous la forme d'un tableau de Clients
			$handle = fopen(self::_CSV_FILE, 'r');
			fgetcsv($handle); // Zapper la ligne d'en-tête
			
			while($row = fgetcsv($handle)) { // Pour chaque ligne du fichier CSV
				$telephones = explode(',', $row[3]); // On récupérer les multi-lignes
				$forfaits   = explode(',', $row[4]);
				$data_used  = explode(',', $row[5]);
				
				$client = new Clients($row[0], $row[1], $row[2]); // On créer le client
				foreach ($telephones as $key => $tel) { // On ajoute ses multi-lignes
					$client->ajouterLigne($tel, $forfaits[$key]);
					$client->utiliserData($tel, $data_used[$key]);
				}
				
				$tabClients[] = $client; // On ajoute la référence au tableau
			}
			fclose($handle);
		}
		
		$db = $GLOBALS['BAO']->getDb();
		if ($db) {
			// Récupérer la totalité des clients depuis la table, et le renvoi sous la forme d'un tableau de Clients
			$sql = "SELECT idClient, civilite, prenom, nom, libelle AS libelleForfait, telephone, dataUsed FROM clients LEFT JOIN forfaits USING (codeForfait)";
			$stmt = $db->query($sql);

			if ($stmt === false || $stmt->errorCode() !== '00000') die("Erreur lors de l'extraction des clients");
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($rows as $row) {
				$client = new Clients($row['civilite'], $row['prenom'], $row['nom']); // On créer le client
				if (isset($row['telephone'])) $client->ajouterLigne($row['telephone'], $row['libelleForfait']);
				if (isset($row['dataUsed']))  $client->utiliserData($row['telephone'], $row['dataUsed']);
				
				$tabClients[$row['idClient']] = $client; // On ajoute la référence au tableau, avec le numéro identifiant cet utilisateur
			}
		}
	}
	
	
	// Ne fonctionne que si le compte existe dans la BDD
	static function delete($idClient) {
		$db = $GLOBALS['BAO']->getDb();
		if ($db) {
			// Récupérer la totalité des clients depuis la table, et le renvoi sous la forme d'un tableau de Clients
			$sql = "DELETE FROM clients WHERE idClient = :idClient";
			$stmt = $db->prepare($sql);
			$stmt->execute(array('idClient' => $idClient));
			
			if ($stmt->errorCode() !== '00000') die("Erreur lors de la suppression du client dans la bdd");
		}
	
	}
	
}

