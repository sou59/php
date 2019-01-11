<?php

	$ii = 0;
	$tabClients[$ii] = new Client('M.', 'Jean', 'ALOUET');
	$tabClients[$ii]->ajouterLigne('0102030405', 'play');
	$tabClients[$ii]->utiliserData('0102030405', 340340);
	
	$ii++;
	$tabClients[$ii] = new Client('Mme', 'Alice', 'DELAH');
	$tabClients[$ii]->ajouterLigne('0607080304', 'zen');
	
	$ii++;
	$tabClients[$ii] = new Client('Mlle', 'Louise', 'DELAH');
	$tabClients[$ii]->ajouterLigne('0607080305', 'play');
	$tabClients[$ii]->utiliserData('0607080305', 4567890);
	$tabClients[$ii]->utiliserData('0607080305', 4567890);
	
	$ii++;
	$tabClients[$ii] = new Client('M.', 'Albert', 'DUPONT');
	$tabClients[$ii]->ajouterLigne('0825010101', 'zen');

	$ii++;
	$tabClients[$ii] = new Client('M.', 'Durand', 'DUPOND');
	$tabClients[$ii]->ajouterLigne('0901010101', 'jet');
	$tabClients[$ii]->utiliserData('0901010101', 345678900);
	
	$ii++;
	$tabClients[$ii] = new Client('M.', 'Jack', 'NONE');

	$ii++;
	$tabClients[$ii] = new Client('M.', 'Romain', 'TWO');
	$tabClients[$ii]->ajouterLigne('0301010101', 'zen');
	$tabClients[$ii]->ajouterLigne('0401010101', 'jet');
	$tabClients[$ii]->utiliserData('0401010101', 34567800);

	unset($ii);
