<?php
   $a = "Aujourd'hui";
   $b = 'Aujourd\'hui';

   $c = "la variable \$a = \"$a\"";
   $d = 'la variable $b = "'.$b.'"';


   var_dump($c);
   echo "<br />";
   var_dump($d);


   // Syntaxe HEREDOC :
   //  - EOT est un délimiteur (début et fin de bloc) choisis par le développeur,
   //    /!\ ni espaces, ni tabulations autour
   //        un saut de ligne après le point-virgule (;)
   $e = <<<"EOT"
Coucou $b
EOT;

   // Syntaxe NOWDOC, même restriction que HEREDOC
   $f = <<<'ORANGE'
Coucou $b
ORANGE;

echo "<br />";
var_dump($e, $f);