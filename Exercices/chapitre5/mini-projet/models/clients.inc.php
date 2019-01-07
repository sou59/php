<?php

    // Création d'un premier client, avec telephone et forfait (Solution avec le code explosé en plusieurs lignes)
    $ii = 0;
    $telephone1      = new Telephone('0102030405');
    $forfait1        = new ForfaitPlay($telephone1);
    $forfait1->utiliserData(340340);
    $tabClients[$ii] = new Client('M.', 'Jean', 'ALOUET');
    $tabClients[$ii]->ajouterForfait($forfait1);
    
    // Création d'un client (code sur un minimum de ligne)
    $ii++;
    $tabClients[$ii] = new Client('Mme', 'Alice', 'DELAH');
    $tabClients[$ii]->ajouterForfait(new ForfaitZen(new Telephone('0607080304')));
 
    unset($ii);

    // Ajout des clients en provenance d'un système persistant de stockage
    $tabClients = array_merge($tabClients, Client::loadAll());