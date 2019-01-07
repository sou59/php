<?php
   $variable = true;

   // Création des tableaux avec la fonction « array() »
   $tab  = array(12250, 15555, 12000, 21300, 25252, 20010, 8460);
   $tab2 = array($variable, "texte", 153, 56);


   // Affichage des tableaux pour débogue
   echo "<pre>";
      var_dump($tab);
      var_dump($tab2);
   echo "</pre>";

   // Récupération d'éléments spécifiques dans les tableaux
   echo '$tab[0]  = '.$tab[0]  . '<br />';
   echo '$tab2[1] = '.$tab2[1] . '<br />';
      

   // Création d'un tableau en explosant une phrase sur les espaces
   $tab3 = explode(" ", "Ceci est une phrase pourtant simple");
   echo "<pre>";
      var_dump($tab3);
   echo "</pre>";
   
   
   // Création d'un tableau en utilisant plusieurs instructions, mais sans ce soucier des index
   $tab4[0]   = 'Bonjour';
   $tab4[1]   = 'le';
   $tab4[50]  = 'monde';
   $tab4[25]  = 'grand';
   $tab4[]    = '!';

   echo "<pre>";
      var_dump($tab4);
   echo "</pre>";
   
   // Une façons d'utiliser la syntaxe [] beaucoup plus intéressante
   $tab5[] = "Message 1";
   $tab5[] = "Message 2";
   $tab5[] = "Message 3";
   
   echo "<ul>";
      echo '<li>' . implode('</li><li>', $tab5) . '</li>';
   echo "</ul>";
