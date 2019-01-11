<?php
namespace Adapter;

interface Document
{

    /**
     *
     * @param string $contenu            
     */
    function setContenu($contenu);

    function dessine();

    function imprime();
}
