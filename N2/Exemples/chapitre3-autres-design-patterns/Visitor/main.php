<?php
namespace Visitor;

require_once 'SocieteSansFiliale.class.php';
require_once 'SocieteMere.class.php';
require_once 'VisiteurMailingCommercial.class.php';

$societe1 = new SocieteSansFiliale('société1', 
        'info@societe1.com', 'rue de la société 1');
$societe2 = new SocieteSansFiliale('société2', 
        'info@societe2.com', 'rue de la société 2');
$groupe1 = new SocieteMere('groupe1', 'info@groupe1.com', 
        'rue du groupe 1');
$groupe1->ajouteFiliale($societe1);
$groupe1->ajouteFiliale($societe2);

$societe3 = new SocieteSansFiliale('société3', 
        'info@societe3.com', 'rue de la société 3');
$groupe2 = new SocieteMere('groupe2', 'info@groupe2.com', 
        'rue du groupe 2');
$groupe2->ajouteFiliale($groupe1);
$groupe2->ajouteFiliale($societe3);
$groupe2->accepteVisiteur(new VisiteurMailingCommercial());

?>
