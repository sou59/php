<?php
namespace Visitor;

require_once 'SocieteSansFiliale.class.php';
require_once 'SocieteMere.class.php';

interface Visiteur
{
    /**
     * 
     * @param SocieteSansFiliale $societe
     */
    function visiteSocieteSansFiliale(SocieteSansFiliale $societe);
    
    /**
     * 
     * @param SocieteMere $societe
     */
    function visiteSocieteMere(SocieteMere $societe);
}


?>
