<?php
   function puissance2($x) {
      return $x * $x;
   }

   $valeur   = 5;
   $resultat = puissance2($valeur);
   
   printf(
       "La valeur de [%d], à la puissance de 2 vaut : %b",
       $valeur,
       $resultat
   );
