<?php
	require ('scripts/all_importants.php');
	$_ACL[] = 'ADMIN';
	require ('scripts/acl_or_redirect.php');

	// Inclure les clients
	require (DIR_BASE.'/models/clients.inc.php');

	// Afficher le resultat
	$tpl_contents = 'templates/lstClients.phtml';
	require ('templates/_structures.phtml');