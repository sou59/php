<?php
namespace Prototype;

require_once 'Liasse.class.php';

class LiasseClient extends Liasse
{
    /**
     * 
     * @param string $informations
     */
    public function __construct($informations)
    {
        $this->documents = new \ArrayObject();
        $laLiasseVierge = LiasseVierge::Instance();
        foreach ($laLiasseVierge as $document)
        {
            $copieDocument = $document->duplique();
            $copieDocument->remplit($informations);
            $this->documents[] = $copieDocument;
        }
    }

    public function affiche()
    {
        foreach ($this as $document) {
            $document->affiche();
        }
    }

    public function imprime()
    {
        foreach ($this as $document)
            $document->imprime();
    }
}

?>
