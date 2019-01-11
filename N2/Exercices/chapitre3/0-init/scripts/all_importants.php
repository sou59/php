<?php

	// Utiliser la session géré par PHP
	session_start();
	
	// Constantes utiles
	define('DIR_BASE', realpath('.'));

	// En cas de formulaire avec PHP < 5.4
	if (get_magic_quotes_gpc()) { // Nécessaire sur PHP < 5.4, si l'option pas désactivé par défaut dans la configuration serveur
		foreach ($_GET    as &$val) $val = stripslashes($val);
		foreach ($_POST   as &$val) $val = stripslashes($val);
		foreach ($_COOKIE as &$val) $val = stripslashes($val);
	}
	
	// Inclure l'autoloader des classes
	require (DIR_BASE.'/scripts/autoloader.inc.php');
	
	// Création de la boite à outils globales
	$GLOBALS['BAO'] = BoiteAOutils::getInstance();

