<?php
   $bool   = true;
   $str    = "true";
   $int    = 1;
   $double = 1.0;
   $nulle  = null;
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Tests des types de variables</title>
      <meta charset="UTF-8" />
   </head>
   <body>
   
      <!-- Debug avec var_dump -->
      <p>$bool   : <?php var_dump($bool);   ?></p>
      <p>$str    : <?php var_dump($str);    ?></p>
      <p>$int    : <?php var_dump($int);    ?></p>
      <p>$double : <?php var_dump($double); ?></p>
      <p>$nulle  : <?php var_dump($nulle);  ?></p>

      <!-- Tests de type -->
      <p>is_numeric($double) : <?php var_dump(is_numeric($double)); ?></p>
      <p>is_numeric($bool)   : <?php var_dump(is_numeric($bool));   ?></p>
      <p>is_string($double)  : <?php var_dump(is_string($double));  ?></p>
      
   </body>
</html>