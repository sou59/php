<?php
    /**
     * Cette déclaration est possible depuis PHP 7
     */
    //function add(int $a, int $b = 2) : int {
    //    return $a + $b;
    //}
    
    /**
     * Cette déclaration est utilisé avant PHP 7, elle est toujours valide en PHP7
     */
    function add($a, $b = 2) {
        if (!is_int($a)) {
            trigger_error("First param is not an Integer", E_USER_ERROR);
        }
        if (!is_int($b)) {
            trigger_error("Second param is not an Integer", E_USER_ERROR);
        }
        return (int) $a + $b;
    }
    
    
    echo add(4, 5); // 9
    echo "<br />\n";
    echo add(4);    // 6