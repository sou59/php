<?php
	// On test les droits
	if (!isset($_SESSION['userrole'])) {
		$redirect = '/index.php?errcode=1';
	} else if (!isset($_ACL)) {
		// Pas de gestion de droit, ouvert au public
		$redirect = null;
	} else if (is_array($_ACL) && in_array($_SESSION['userrole'], $_ACL)) {
		// Pas de gestion de droit, ouvert au public
		$redirect = null;
	} else if (is_string($_ACL) && $_SESSION['userrole'] !== $_ACL) {
		// Pas de gestion de droit, ouvert au public
		$redirect = null;
	} else if (isset($_SESSION['test_IP']) && $_SESSION['test_IP'] !== $_SERVER['REMOTE_ADDR']) {
		$redirect = '/index.php?errcode=2';
	} else {
		$redirect = '/index.php?errcode=3';
	}

	if (!is_null($redirect)) {
		header('Location: '.$GLOBALS['BAO']->getUrlBase().$redirect);
		exit();
	}
