<?php
   // Créer une chaîne de caractère à stocker
   $stringData=<<<EOT
Ceci est un texte
de test.
Sur plusieurs lignes !
EOT;
   
   // Ouvrir le fichier de destination
   $fp = fopen('filename.ext', 'w');
   
   // Boucler sur l'écriture du fichier tant que celui-ci n'est pas écrit complétement
   for ($w = 0; $w < strlen($stringData); $w += $nbWrite) {
      // Écrire les données
      $nbWrite = fwrite($fp, substr($stringData, $w));
      
      // En cas d'erreur
      if ($nbWrite === false) { die('Erreur'); }
   }
   
   // Fermer le fichier précédement ouvert
   fclose($fp);
