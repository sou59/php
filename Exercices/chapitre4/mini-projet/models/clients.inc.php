<?php



  $ii = 0;
  $tabClients[$ii] = new Client('M.', 'Jean', 'ALOUET', "0320154878", "Num spéciaux", new Forfait('Play'));
  
  $ii++;
  $tabClients[$ii] = new Client('Mme', 'Alice', 'DELAH', "0215487963", "Tél mobile", new Forfait('Zen'));
  
  $ii++;
  $tabClients[$ii] = new Client('Mlle', 'Louise', 'DELAH', "0125364789", "Fixe", new Forfait('Play'));
  
  $ii++;
  $tabClients[$ii] = new Client('M.', 'Albert', 'DUPONT', "0412457896", "Pas de zone", new Forfait('Zen'));

  $ii++;
  $tabClients[$ii] = new Client('M.', 'Durand', 'DUPOND', "0512568974", "Toto", new Forfait('Jet'));
  
  unset($ii);


