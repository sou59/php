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
    
    $ii++;
    $tabClients[$ii] = new Client('M.', 'Albert', 'DUPONT');
    $tabClients[$ii]->ajouterForfait(new ForfaitZen(new Telephone('0825010101')));
    
    // Création d'un client sans forfait
    $ii++;
    $tabClients[$ii] = new Client('M.', 'Jack', 'NONE');
    
    
    // Création d'un client avec deux forfaits
    $ii++;
    $tabClients[$ii] = new Client('M.', 'Romain', 'TWO');
    $tabClients[$ii]->ajouterForfait(new ForfaitZen(new Telephone('0301010101')));
    $tabClients[$ii]->ajouterForfait(new ForfaitJet(new Telephone('0401010101')));
    
    // Modification après-coup des données utilisées sur son forfait Jet.
    $forfaits = $tabClients[$ii]->getAllForfaits();
    $forfaits[1]->utiliserData(34567800);
 
    unset($ii);
