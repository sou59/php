<?php

function puissance2(int $x): int {
   return $x*$x;
}

echo "la puissance de 2 à la puissence 2 = " . puissance2(2);

echo '<br>';

echo "la puissance de 4 à la puissence 2 = " . puissance2(4);

echo '<br>';

// echo "la puissance de 4 à la puissance 2 = " . puissance2("toto");
echo '<br>';

function puissance(int $x, int $y): int {
  /*
    pour $x = 2 : $y = 3
      1 : x*x
      2 : x*x*x
  */
if ($y == 0) {
    $temp = 1;
} else if ($x == 0) {
    $temp = 0;
} else {

   $temp = $x;
       for ($i = 1; $i < $y; $i++) {
       $temp = $temp*$x; 
       // nombre de boucle déterminé par $y, donc on multiplie $x par lui même
       }
    return $temp;
   }
}
 
 echo '<br>';

echo "la puissance de 2 à la puissance 3 = " . puissance(2,3);
 