<?php
   $a = "3"; // Chaîne de caractère

   echo "<pre>";
      var_dump($a); // C'est confirmé par var_dump(), type (string)

      var_dump($a + 1); // Transtypage de la chaine en entier
      var_dump($a + 1.0); // Transtypage de la chaine en float
      
      var_dump(1 + "-1.3e3");
   echo "</pre>";

   $b = "3 petits cochons";	
   echo "<pre>";
      var_dump(1 + $b);
      var_dump($b + 1);
      var_dump(2.0 . $b);
      var_dump(2.1 . $b);
      var_dump(true . $b);
   echo "</pre>";
      
      
   $c = 0;	
   echo "<pre>";
      var_dump((bool) $c);
      var_dump((double) $c);
      var_dump((string) $c);
      var_dump((array) $c);
   echo "</pre>";
