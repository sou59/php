<?php
	require ('scripts/all_importants.php');
	$_ACL[] = 'ADMIN';
	require ('scripts/acl_or_redirect.php');


	// Gérer le formulaire
	if (isset($_POST['submit'])) {
		$civilite  = in_array($_POST['civilite'], array("M.", "Mme", "Mlle")) ? $_POST['civilite'] : "M.";
		$prenom    = $_POST['prenom'];
		$nom       = $_POST['nom'];
		$forfait   = in_array($_POST['forfait'], array("zen", "play", "jet")) ? $_POST['forfait'] : "M.";
		$telephone = $_POST['telephone'];
		
		unset($err);
		if (empty($prenom))   $err[] = "Le champ 'prenom' est obligatoire !";

		if (!isset($err)) {
			// Traiter le forumulaire
			$client = new Clients($civilite, $prenom, $nom);
			$client->ajouterLigne($telephone, $forfait);
			$client->save();
			
			$tosee[] = "<b>Nom :</b>       <i>{$client->getFullName()}</i>";
			$tosee[] = "<b>Forfait :</b>   <i>$forfait</i>";
			$tosee[] = "<b>Téléphone :</b> <i>$telephone</i>";
		}
	}
	
	// Afficher le resultat
	$tpl_contents = 'templates/formClients.phtml';
	require ('templates/_structures.phtml');