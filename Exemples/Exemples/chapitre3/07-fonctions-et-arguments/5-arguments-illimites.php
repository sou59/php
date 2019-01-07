<?php
    function dump() {
       echo "Nombre d'argument : " . func_num_args() . "<br />\n";
       var_dump(func_get_args());
    }
    dump(2, 50, "tartiflette", array());    // Affiche chaque paramètre dans un var_dump() ...
    dump(90);                               // … quelques soit le nombre d’arguments