<?php
namespace Builder;

abstract class Liasse
{
    /**
     * 
     * @var "Liste de string"
     */
    protected $contenu = array();
    
    /**
     *
     * @param string $document            
     */
    public abstract function ajouteDocument($document);

    public abstract function imprime();
}

?>
