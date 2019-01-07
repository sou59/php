<?php
   $tab = array("key 1" => "500"
              , "key 2" => "1000"
              , "key 3" =>  1500);

   // Recherche de la valeur 1000 dans le tableau
   echo "<pre>";
      var_dump(in_array(1000, $tab));
      var_dump(in_array(1000, $tab, true)); // Mode Strict
   echo "</pre>";
      
   // Recherche de la clé ayant pour valeur 1000 dans le tableau
   echo "<pre>";
      var_dump(array_search(1000, $tab));
   echo "</pre>";
