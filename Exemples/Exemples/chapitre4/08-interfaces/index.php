<?php

interface Telephone {
	function __construct($phoneNumber);
	function Appeler();
}
interface GererSms {
	function SmsEnvoyer();
	function SmsRecevoir();
}


class TelephoneFixe implements Telephone {
	protected $houseNumber = null;

	public function __construct($houseNumber) {
		$this->houseNumber = $houseNumber;
	}
	public function Appeler() {
		echo "Appeler le fixe <em>$this->houseNumber</em><br />\n";
	}
}
class TelephoneMobile implements Telephone, GererSms {
	protected $mobileNumber;

	public function __construct($phoneNumber) {
		$this->mobileNumber = $phoneNumber;
	}
	public function Appeler() {
		echo "Appeler le mobile <em>$this->mobileNumber</em><br />\n";
	}
	public function SmsEnvoyer()  {
		echo "Mobile SMS Envoyer<br />\n";
	}
	public function SmsRecevoir()  {
		echo "Mobile SMS Recevoir<br />\n";
	}
}

class Beeper implements GererSms {
	public function SmsEnvoyer()  {
		echo "Beeper SMS Envoyer<br />\n";
	}
	public function SmsRecevoir()  {
		echo "Beeper SMS Recevoir<br />\n";
	}
}


$tel  = new Telephone(); 									 // Erreur fatale
$telM = new TelephoneMobile('0606060606'); // Ok
$telF = new TelephoneFixe('0101010101');   // Ok
$beep = new Beeper();

// On peut utiliser les fonctions d'appel
$telM->Appeler();
$telF->Appeler();


// Ou on peut utiliser instanceof pour s'assurer que l'objet peut manipuler les SMS
function canManageSms($obj) {
	return ($obj instanceof GererSms); // VRAI si l'objet est une instance de GererSMS, faux sinon
}
