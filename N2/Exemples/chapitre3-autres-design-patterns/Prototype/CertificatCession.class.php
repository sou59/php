<?php
namespace Prototype;

require_once 'Document.class.php';
require_once '../Outils.class.php';

class CertificatCession extends Document
{
    public function affiche()
    {
        \Outils::println(
        "Affiche le certificat de cession : $this->contenu");
    }

    public function imprime()
    {
        \Outils::println(
        "Imprime le certificat de cession : $this->contenu");
    }
}

?>
