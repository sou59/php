<?php
   $age = 25;

   // Detection du profil suivant l'age
   if ($age < 18) {
      $profil = "jeune";
   } else if ($age >= 18 && $age < 35) {
      $profil = "jeune-adulte";
   } else {
      $profil = "adulte";
   }


   echo "Votre profil est '";
   
   switch ($profil) {
   case 'jeune':
      echo "Jeune";
      break;
   case 'jeune-adulte':
      echo "Jeune Adulte";
      break;
   case 'adulte':
      echo "Adulte";
      break;
   default:
      echo "<Profil inconnu>";
   }
   
   echo "' !";
