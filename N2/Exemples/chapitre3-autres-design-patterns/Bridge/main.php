<?php
namespace Bridge;

require_once '../Outils.class.php';
require_once 'FormImmatriculationLuxembourg.class.php';
require_once 'FormHtmlImpl.class.php';
require_once 'FormImmatriculationFrance.class.php';
require_once 'FormAppletImpl.class.php'; 
                                   

$formulaire1 = new FormImmatriculationLuxembourg(
        new FormHtmlImpl());
$formulaire1->affiche();
if ($formulaire1->gereSaisie())
{
    $formulaire1->genereDocument();
}
\Outils::println();

$formulaire2 = new FormImmatriculationFrance(
        new FormAppletImpl());
$formulaire2->affiche();
if ($formulaire2->gereSaisie())
{
    $formulaire2->genereDocument();
}
?>
