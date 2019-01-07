<?php

   function fonctionArgumentsParReferences(&$var) {
      $var = $var + 1;
   }

   $compteur = 0;
   echo "Compteur = " . $compteur . "<br />";
   
   fonctionArgumentsParReferences($compteur) . "<br />";
   fonctionArgumentsParReferences($compteur) . "<br />";
   fonctionArgumentsParReferences($compteur) . "<br />";
   fonctionArgumentsParReferences($compteur) . "<br />";
   echo "Compteur = " . $compteur . "<br />";
   
   fonctionArgumentsParReferences($compteur) . "<br />";
   fonctionArgumentsParReferences($compteur) . "<br />";
   fonctionArgumentsParReferences($compteur) . "<br />";
   fonctionArgumentsParReferences($compteur) . "<br />";
   echo "Compteur = " . $compteur . "<br />";
