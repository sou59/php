<?php
   $a = 0.0;
   $b = "Hello";

   echo "<pre>";
      var_dump($a);
      $a++;
      var_dump($a);
      $a+= 99;
      var_dump($a);
      $a/= 5;
      var_dump($a);
      $a*= 2;
      var_dump($a);
   echo "</pre>";
      
   echo "<pre>";
      var_dump($b);
      $b.= " world";
      var_dump($b);
      $b = "$b!";
      var_dump($b);
   echo "</pre>";
