<?php

// Cette fonction est appelé lors que l'on tente d'utiliser une classe que PHP ne connait pas encore
// /!\ Utilisation des fonctions anonymes, la fonction n'a pas de nom, et est utilisé une seule et unique fois !
spl_autoload_register(function ($className) {

	if (file_exists("classes/$className.php")) {
		require ("classes/$className.php");
	} else {
		return false; // On laisse le système léver une erreur fatale !
	}

});

//$personne = new Personnes(); // Classe abstraite
$client   = new Clients();
$salarie  = new Salaries();

$client->nom  = 'Client';
$salarie->nom = 'Salarié';

var_dump($client, $salarie);
