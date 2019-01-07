<?php
   /*
    * Note : printf(), est une fonction native qui permet d'afficher à la manière du mot clé « echo »,
    * le arobase (@) devant permet de demander à PhP de ne pas afficher d'erreur à l'écran, utile pour l'exercice
    */

   $param = 3;

   function decrementer($valeur) {
      $valeur = $valeur -1;
      @printf($param);
   }
   
   decrementer($param);
   @printf($param);
   @printf($valeur);
