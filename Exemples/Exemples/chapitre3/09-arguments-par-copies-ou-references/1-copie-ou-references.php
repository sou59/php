<?php

   function fois2c($valeur) { // Passage par copie
      $valeur = $valeur * 2;
   }
   
   function fois3r(&$valeur) { // Passage par référence
      $valeur = $valeur * 3;
   }
   
   $maValeur = 5;
   var_dump($maValeur);
   
   fois2c($maValeur);
   var_dump($maValeur);
   
   fois3r($maValeur);
   var_dump($maValeur);