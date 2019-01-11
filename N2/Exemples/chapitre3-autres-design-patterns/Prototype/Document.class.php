<?php
namespace Prototype;

abstract class Document 
{
    /**
     * @var string
     */
    protected $contenu = "";

    /**
     * @return null|Document
     */
    public function duplique()
    {
        $resultat = null;
        try
        {
            $resultat = clone $this;
        }
        catch (CloneNotSupportedException $exception)
        {
            return null;
        }
        return $resultat;
    }

    /**
     * 
     * @param string $informations
     */
    public function remplit($informations)
    {
        $this->contenu = $informations;
    }

    public abstract function imprime();
    public abstract function affiche();
}

?>
