<?php
   
   // Création d'un tableau à index associatif avec la fonction array()
   $tab  = array(
      "prenom" => "Cyril",
      "age"    => 87,
                  999999
   );

   // Création d'un tableau associatif en plusieurs instructions disctinctes
   $tab2['prenom'] = "Olivier";
   $tab2['nom']    = "LONZI";
   $tab2['ville']  = "Paris";

   echo "<pre>";
      var_dump($tab);
      var_dump($tab2);
   echo "</pre>";
?>
   <p>Votre contact &agrave; <?=$tab2['ville']?> sera <?=$tab2['prenom']?> <?=$tab2['nom']?> !</p>
