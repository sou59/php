<?php
   $tab = array(
      'prenom'  => 'Cyril',
      'ville'   => 'Paris',
      'travail' => 'Informatique'
   );

   foreach($tab as $elt) {
      echo "Valeur : $elt<br />";
   }
   
   foreach($tab as $key => $elt) {
      echo "<strong>$key</strong> : $elt<br />";
   }
