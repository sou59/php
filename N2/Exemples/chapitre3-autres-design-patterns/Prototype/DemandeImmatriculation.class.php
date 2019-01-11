<?php
namespace Prototype;

require_once 'Document.class.php';
require_once '../Outils.class.php';

class DemandeImmatriculation extends Document
{
    public function affiche()
    {
        \Outils::println(
        "Affiche la demande d'immatriculation : $this->contenu");
    }

    public function imprime()
    {
        \Outils::println(
        "Imprime la demande d'immatriculation : $this->contenu");
    }
}


?>
