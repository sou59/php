<?php
   echo "<pre>";
      $i = 1;
      while (true) {
         echo "<br />While : $i";
         break;
      }

      echo "<br />";

      $i = 5;
      while (true) {           // Label While1
         echo "<br />While : ".$i++;
         if ($i < 7) continue;  // Goto "Label While1" si $1 < 7
         break;
      }

      echo "<br />";
         
      $i = 10;
      while (true) {           // Label While2
         echo "<br />While : ".$i++;
         if ($i < 30) continue;  // Goto "Label While2" si $1 < 30
         exit(10); // On stop purement et simplement le script avec le code d'erreur 10
      }

      // Ceci n'est pas executé car exit 10 juste au dessus

      // die() et équivalent à exit(), mais permet l'affichage d'un message d'erreur.
      die ("Message mortuaire du script");
   echo "</pre>";
