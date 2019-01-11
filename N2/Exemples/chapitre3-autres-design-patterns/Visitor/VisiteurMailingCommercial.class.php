<?php
namespace Visitor;

require_once 'Visiteur.class.php';
require_once 'SocieteSansFiliale.class.php';
require_once 'SocieteMere.class.php';
require_once '../Outils.class.php';

class VisiteurMailingCommercial implements Visiteur
{

    public function visiteSocieteSansFiliale(
                     SocieteSansFiliale $societe)
    {
        \Outils::println(
                'Envoi d\'un email à ' . $societe->getNom() .
                 ' adresse : ' . $societe->getEmail() .
                 ' Proposition commerciale pour votre société');
    }

    public function visiteSocieteMere(SocieteMere $societe)
    {
        \Outils::println(
                'Envoi d\'un email à ' . $societe->getNom() .
                 ' adresse : ' . $societe->getEmail() .
                 ' Proposition commerciale pour votre groupe');
        \Outils::println(
                'Impression d\'un courrier à ' .
                 $societe->getNom() . ' adresse : ' .
                 $societe->getAdresse() .
                 ' Proposition commerciale pour votre groupe');
    }
}

?>
