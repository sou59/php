<?php
  // Récupération du titre et du contenu de la page dans une Bdd ou autres
  $titre = "Titre la page MVC";
  $texte = <<<'EOT'
Contenu de l'article,<br />avec des saut de lignes HTMLs.
<em>une valeur emphasé</em> !
EOT;

?>
<!DOCTYPE html>
<html>
  <head>
    <title><?=$titre?></title>
    <meta charset="UTF-8" />
  </head>
  <body>
     <h1><?=$titre?></h1>
     <article><?=$texte?></article>
  </body>
</html>
