<?php
	require ('scripts/all_importants.php');
	$_ACL[] = 'CLIENT';
	require ('scripts/acl_or_redirect.php');
	
	// Gérer le formulaire
	if (isset($_POST['submit'])) {
		$civilite  = in_array($_POST['civilite'], array("M.", "Mme", "Mlle")) ? $_POST['civilite'] : "M.";
		$prenom    = $_POST['prenom'];
		$nom       = $_POST['nom'];
		$message   = $_POST['message'];
		
		unset($err);
		if (empty($prenom))   $err[] = "Le champ 'prenom' est obligatoire !";

		// Gestion des fichiers
		if (isset($_FILES) && isset($_FILES['pj']) && isset($_FILES['pj']['error'])) {
			if ($_FILES['pj']['error'] != 0) {
				$err[] = "Le champ 'pj' est obligatoire !";
			} else {
				// Sauvegarde du fichier
				if (!file_exists('uploads/.')) mkdir('uploads/');
				$pj = "uploads/".$_FILES['pj']['name'];
				move_uploaded_file($_FILES['pj']['tmp_name'], $pj);
			}
		} else  $err[] = "Le champ 'pj' est obligatoire !";

		
		if (!isset($err)) {
			// Traiter le formulaire
			$destinataire = "...@...";
			$sujet        = "Message de contact de notre site de test";
			$message      = "Données saisies par l'utilisateur :". PHP_EOL
			              . " - Nom complet : $civilite $prenom $nom".PHP_EOL
			              . " - P.J. : ".$GLOBALS['BAO']->getUrlBase()."$pj".PHP_EOL
			              . " - Message : $message".PHP_EOL;
			             
			mail($destinataire, $sujet, $message);
			
			// Rediriger l'utilisateur vers la page d'accueil
			header('Location: '.$GLOBALS['BAO']->getUrlBase());
			exit();
		}
	}
	
	// Afficher le resultat
	$tpl_contents = 'templates/contact.phtml';
	require ('templates/_structures.phtml');	
