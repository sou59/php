<?php
namespace TemplateMethod;

require_once 'Commande.class.php';

class CommandeFrance extends Commande
{
    protected function calculeTva()
    {
        $this->montantTva = $this->montantHt * 0.196;
    }
}


?>
