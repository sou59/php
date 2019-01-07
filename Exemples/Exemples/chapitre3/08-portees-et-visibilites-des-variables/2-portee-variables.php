<?php
   
   $chaine = 'Nombre au compteur : ';
   
   function compter($afficher = false) {
      global $chaine;
      static $compteur = 0;
      $compteur++;

      if ($afficher) {
         echo $chaine.$compteur."<br />";
      }
   }
   
   
   compter();
   compter();
   compter();
   compter(true);
   compter();
   compter();
   compter();
   $chaine = "Valeur du compteur :";
   compter(true);