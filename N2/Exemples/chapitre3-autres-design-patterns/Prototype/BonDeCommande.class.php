<?php
namespace Prototype;

require_once 'Document.class.php';
require_once '../Outils.class.php';

class BonDeCommande extends Document
{
    public function affiche()
    {
        \Outils::println(
                "Affiche le bon de commande : $this->contenu");
    }

    public function imprime()
    {
        System.out.println(
                "Imprime le bon de commande : $this->contenu");
    }
}


?>
