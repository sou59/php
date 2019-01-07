<?php
   $stringData=<<<EOT
Ceci est un texte
de test.
Sur plusieurs lignes !
EOT;

   // Écrire le fichier
   file_put_contents('filename.ext', $stringData);	


   // Lire le fichier, en stockant chaque lignes dans une cellule de tableau
   $tab = file('filename.ext');
   var_dump($tab);
