<?php

        require ('scripts/all_importants.php');
	
	if      (isset($_GET['errcode']) && $_GET['errcode'] == 1) $err[] = "Vous devez être identifié pour accèder à cette ressource";
	else if (isset($_GET['errcode']) && $_GET['errcode'] == 2) $err[] = "Vous n'avez pas la même adresse IP qu'à votre dernière visite, tentative d'usurpation d'IP supposée";
	else if (isset($_GET['errcode']) && $_GET['errcode'] == 3) $err[] = "Vous n'avez pas les droits pour accèder à la page demandée";

	if (isset($_POST['username']) && isset($_POST['userpass'])) {
		if ($_POST['username'] == 'admin' && $_POST['userpass'] == 'coucou') {
			// Connexion réussi
			$_SESSION['fullname'] = 'Administrateur';
			$_SESSION['userrole'] = 'ADMIN';
			$_SESSION['test_IP']  = $_SERVER['REMOTE_ADDR']; // Sauver l'ip utilisé par cette session

			// Redirection
			header("Location: ".$GLOBALS['BAO']->getUrlBase().'/formClients.php');
			exit();
		} else {
			// tester les clients
			require (DIR_BASE.'/models/clients.inc.php');

			foreach ($tabClients as $client):
				if ($client->testUserAndPass($_POST['username'], $_POST['userpass'])) {
					// Connexion réussi
					$_SESSION['fullname'] = $client->getFullName();
					$_SESSION['userrole'] = 'CLIENT';
					$_SESSION['test_IP']  = $_SERVER['REMOTE_ADDR']; // Sauver l'ip utilisé par cette session
					
					header("Location: ".$GLOBALS['BAO']->getUrlBase().'/detailsClients.php');
					exit();
				}
			endforeach;
			$err[] = "Erreur dans votre mot de passe !";
		}
	}	
	
	// Afficher le resultat
	$tpl_contents = 'templates/index.phtml';
	require ('templates/_structures.phtml');
?>
