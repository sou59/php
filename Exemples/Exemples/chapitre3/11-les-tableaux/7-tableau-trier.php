<?php
   // Création d'un tableau sans aucun ordre
   $tab_ = array(
      6 => "Bashful",
      3 => "Grumpy",
      4 => "Happy",
      8 => "Dopey",
      5 => "Sleepy",
      7 => "Sneeze",
      2 => "Doc",
      1 => "Snow White"
   );

   echo "<h3>Original</h3>";
   echo "<pre>";
      print_r($tab_);
   echo "</pre>";

   $tab = $tab_;
   sort($tab);
   echo "<h3>sort()</h3>";
   echo "<pre>";
      print_r($tab);
   echo "</pre>";

   $tab = $tab_;
   rsort($tab);
   echo "<h3>rsort()</h3>";
   echo "<pre>";
      print_r($tab);
   echo "</pre>";

   $tab = $tab_;
   asort($tab);
   echo "<h3>asort()</h3>";
   echo "<pre>";
      print_r($tab);
   echo "</pre>";

   $tab = $tab_;
   ksort($tab);
   echo "<h3>ksort()</h3>";
   echo "<pre>";
      print_r($tab);
   echo "</pre>";

   
   
   echo "<hr />";

   // Création d'un tableau avec des valeurs numériques
   $tab_ = array("texte 2",
                 "texte 19",
                 "texte 3",
                 "texte 1",
                 "texte 12");
   
   $tab = $tab_;
   echo "<h3>Original</h3>";
   echo "<pre>";
      print_r($tab);
   echo "</pre>";

   $tab = $tab_;
   sort($tab);
   echo "<h3>sort()</h3>";
   echo "<pre>";
      print_r($tab);
   echo "</pre>";
   
   $tab = $tab_;
   natsort($tab);
   echo "<h3>natsort()</h3>";
   echo "<pre>";
      print_r($tab);
   echo "</pre>";
