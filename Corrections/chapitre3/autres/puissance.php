<?php
   function puissance($x, $y) {
      
      if ($y == 0) {
          $resultat = 1;
      } else if ($x == 0) {
          $resultat = 0;
      } else {
          $resultat = $x;
          for ($ii = 1 ; $ii < $y ; $ii++) {
              $resultat*= $x;
          }
      }

      return $resultat;
   }

   echo puissance(2, 4);
