<?php
	// Récupérer le set de fonctions personalisées
	require ('scripts/functions.inc.php');

	/* 
		Créer un tableau $tabClients avec au moins 5 clients, comportant les informations suivantes :
		- Prénom
		- Nom
		- Numéro de téléphone
		- Type de forfait (Zen, Play, Jet)
		- Données utilisées (Si Internet dans le forfait)
	*/
	
	require ('models/forfaits.inc.php');
	require ('models/clients.inc.php');

	/*
		Stocker le tableau dans un fichier « export.txt »
	*/
	if (!file_exists('exports/.')) mkdir('exports');
	file_put_contents('exports/forfaits.txt', serialize($tabForfaits));
	file_put_contents('exports/clients.txt',  serialize($tabClients));

	/*
		Parcourir le tableau $tabClients pour afficher les informations en HTML
		Détecter la zone géographique, les mobiles, et les numéros spéciaux en fonction du numéro.
	*/

	require ('templates/index.phtml');
?>
