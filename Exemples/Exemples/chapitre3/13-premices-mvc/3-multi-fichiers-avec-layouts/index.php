<?php
  // Récupération des données de notre modèle (Ici des fichiers textes)
  $tpl['titre'] = file_get_contents('models/index-titre.txt');
  $tpl['texte'] = file_get_contents('models/index-texte.txt');

  
  // Nom du fichier « templates phtml » à charger depuis la structures
  $tpl_filename = 'index';
  
  // Appel du template, qui à besoin des valeurs définies ci-dessus
  // Attention, si toutes les variables $tpl n'ont pas correctement été définie, des Warning vont être levés.
  require('templates/layouts.phtml');
