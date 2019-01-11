<?php
namespace Bridge;

require_once '../Outils.class.php';
require_once 'FormulaireImpl.class.php';

class FormAppletImpl implements FormulaireImpl
{

    public function dessineTexte($texte)
    {
        \Outils::println("Applet : $texte");
    }

    public function gereZoneSaisie()
    {
        return \Outils::readln();
    }
}

?>
