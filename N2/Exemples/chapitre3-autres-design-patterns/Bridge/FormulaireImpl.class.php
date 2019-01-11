<?php
namespace Bridge;

interface FormulaireImpl
{

    /**
     *
     * @param string $texte            
     */
    function dessineTexte($texte);

    /**
     * @return string
     */
    function gereZoneSaisie();
}

?>
