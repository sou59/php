<?php
	require ('scripts/all_importants.php');
	$_ACL[] = 'CLIENT';
	require ('scripts/acl_or_redirect.php');

	// Inclure les clients
	require (DIR_BASE.'/models/clients.inc.php');
	
	// Seul le client identifié nous intéresse
	foreach ($tabClients as $client):
		if ($client->getFullName() === $_SESSION['fullname']) {
			break;
		}
	endforeach;
	
	// Afficher le resultat
	$tpl_contents = 'templates/detailsClients.phtml';
	require ('templates/_structures.phtml');