<?php
    function add($a, $b = 2) {
         return $a + $b;
    }
    echo add(4, 5); // 9
    echo "<br />\n";
    echo add(4);    // 6