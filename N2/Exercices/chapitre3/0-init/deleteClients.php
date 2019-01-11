<?php

	require ('scripts/all_importants.php');
	$_ACL[] = 'ADMIN';
	require ('scripts/acl_or_redirect.php');
	
	Clients::delete((int) $_GET['idClient']);
	
	header('Location: '.$GLOBALS['BAO']->getUrlBase().'lstClients.php');
	exit();
?>
