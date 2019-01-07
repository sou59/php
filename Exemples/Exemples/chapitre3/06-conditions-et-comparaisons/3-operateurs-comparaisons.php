<?php
   $a = 1;
   $b = "1";
   $c = 100;


   echo "<pre>";
      echo '$a &mdash; ';
      var_dump($a);
      echo '$b &mdash; ';
      var_dump($b);
      echo '$c &mdash; ';
      var_dump($c);
   echo "</pre>";


   echo "<pre>";
      echo '$a == $b &mdash; ';
      var_dump($a == $b);
      
      echo '$a === $b &mdash; ';
      var_dump($a === $b);
      
      echo '$a !== $b &mdash; ';
      var_dump($a !== $b);
   echo "<pre>";
   echo "</pre>";
      echo '$a < $c &mdash; ';
      var_dump($a < $c);
      
      echo '$a > $c &mdash; ';
      var_dump($a > $c);
      
      echo '$a <= $b &mdash; ';
      var_dump($a <= $b);
      
      echo '$a >= $b &mdash; ';
      var_dump($a >= $b);
   echo "</pre>";
   echo "<pre>";
      echo '$a != $b &mdash; ';
      var_dump($a != $b);
      
      echo '$a != $c &mdash; ';
      var_dump($a != $c);
   echo "</pre>";

