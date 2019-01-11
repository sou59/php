<?php
namespace Bridge;

require_once '../Outils.class.php';
require_once 'FormulaireImpl.class.php';

class FormHtmlImpl implements FormulaireImpl
{

    public function dessineTexte($texte)
    {
        \Outils::println("HTML : $texte");
    }

    public function gereZoneSaisie()
    {
        return \Outils::readln();
    }
}
?>
