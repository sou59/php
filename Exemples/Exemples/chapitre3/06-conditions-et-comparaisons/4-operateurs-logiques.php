<?php
   $a = true;
   $b = false;
   
   echo "<pre>";
      echo '$a &mdash; ';
      var_dump($a);
      echo '$b &mdash; ';
      var_dump($b);
   echo "</pre>";
      
   echo "<pre>";
      echo '$a && $b &mdash; ';     var_dump($a && $b);
      echo '$a and $b &mdash; ';    var_dump($a and $b);
      echo '$a && $a &mdash; ';     var_dump($a && $a);
      echo '$a || $b &mdash; ';     var_dump($a || $b);
      echo '$a or $b &mdash; ';     var_dump($a or $b);
      echo '$b || $b &mdash; ';     var_dump($b || $b);
      echo '$a xor $b &mdash; ';    var_dump($a xor $b);
      echo '$a xor $a &mdash; ';    var_dump($a xor $a);
      echo '!$a &mdash; ';          var_dump(!$a);
      echo '!$b &mdash; ';          var_dump(!$b);
   echo "<pre>";
