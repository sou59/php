<?php
   $bool   = true;
   $str    = "true";
   $int    = 1;
   $double = 1.0;
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Types de variables</title>
      <meta charset="UTF-8" />
   </head>
   <body>
      <h1> Les types de variables</h1>
            <?=gettype($bool)?>   : <?=$bool?>
      <br /> <?=gettype($str)?>    : <?=$str?>
      <br /> <?=gettype($int)?>    : <?=$int?>
      <br /> <?=gettype($double)?> : <?=$double?>
     
   </body>
</html>
