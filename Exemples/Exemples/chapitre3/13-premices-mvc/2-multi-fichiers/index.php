<?php
  // Récupération des données de notre modèle (Ici des fichiers textes)
  $tpl['titre'] = file_get_contents('models/index-titre.txt');
  $tpl['texte'] = file_get_contents('models/index-texte.txt');

  // Appel du template, qui à besoin des valeurs définies ci-dessus
  // Attention, si toutes les variables $tpl n'ont pas correctement été définie, des Warning peuvent être levés.
  require('templates/index.phtml');
