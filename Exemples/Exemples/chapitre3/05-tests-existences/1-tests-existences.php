<?php
   $bool   = true;
   $str    = "true";
   $int    = 1;
   $double = 1.0;
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Tests d'existences</title>
      <meta charset="UTF-8" />
   </head>
   <body>
      <?php
         echo "isset(\$double) : ";
         var_dump(isset($double));
      ?>
      <br />
      
      <?php
         echo "unset(\$double);<br />";
         unset($double); // On désafecte la variable
         echo "isset(\$double) : ";
         var_dump(isset($double));
      ?>
      <br />
      
      <?php
         echo "\$test = \"\";<br />";
         $test = ""; // Une variable égale à une chaîne vide
         echo "isset(\$test) : ";
         var_dump(isset($test));
      ?>
      <br />
      
      <?php	
         echo "empty(\$test) : ";
         var_dump(empty($test));
      ?>
      <br />
      <?php	
         echo "\$nonExistant = null;<br />";
         $nonExistant = null;
         echo "isset(\$nonExistant) : ";
         var_dump(isset($nonExistant));
      ?>
      <br />
      <?php
         echo "empty(\$nonExistant) : ";
         var_dump(empty($nonExistant));
      ?>
      <br />
      
      <?php
         echo '<br />Addition d\'une valeur nulle : ', ($nonExistant + 100);
         echo '<br />Concaténation d\'une valeur nulle : [' . $nonExistant . ']';
      ?>
      <br />
   </body>
</html>
