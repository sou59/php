<?php
class BoiteAOutils extends Singleton {
	private $_db = null;

	function getDb() {
		if (!isset($this->_db)) {
			try {
				$this->_db = new PDO("mysql:host=localhost;dbname=formation-php-orange", "formation-orange", "JLayzqz7whntEjJd");
				$this->_db->exec("SET NAMES UTF8");
			} catch (Exception $e) {
				die("Problème de connexion à la base de données");
			}
		}
		return $this->_db;
	}


	function getGeoZoneFromPhoneNumber($telephone) {
		$prefix = substr($telephone, 0, 2);
		switch ($prefix) {
		case '01': return 'Région parisienne';
		case '02': return 'Région nord-ouest et « Océan Indien »';
		case '03': return 'Région nord-est';
		case '04': return 'Région sud-est dont Corse';
		case '05': return 'Région sud-ouest et « Océan Atlantique »';
		case '06': 
		case '07': return 'Téléphone mobile';
		case '08': return 'Numéro spéciaux';
		case '09':
		default:
			return 'Pas de zone';
		}
	}
	
	function getUrlBase() {
		return 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
	}
}
