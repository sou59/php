<?php
   $age = 25;

   // Avec les bloc if-then-else
   if ($age < 18) {
      echo "Vous êtes trop jeune pour entrer ici";
      exit(1); // Quitter totalement PHP avec le code d'erreur 1
      
   } else if ($age > 18 && $age < 35) {
      echo "Votre profil est : jeune adulte";
      exit(2); // Quitter totalement PHP avec le code d'erreur 2
      
   } else {
      // Avec l'opérateur ternaire
      echo "Votre profil est : ".($age == 18 ? 'juste-18' : 'adulte');
   }