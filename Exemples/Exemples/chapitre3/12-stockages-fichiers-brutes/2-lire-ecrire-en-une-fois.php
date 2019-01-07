<?php
   $stringData=<<<EOT
Ceci est un texte
de test.
Sur plusieurs lignes !
EOT;

   // Écrire en une fois dans le fichier
   file_put_contents('filename.ext', $stringData);	
   
   // Afficher le contenu du fichier
   echo file_get_contents('filename.ext');
