<?php
namespace Facade;

require_once 'GestionDocument.class.php';

class ComposantGestionDocument implements GestionDocument
{

    public function document($index)
    {
        return "Document numéro $index";
    }
}

?>
