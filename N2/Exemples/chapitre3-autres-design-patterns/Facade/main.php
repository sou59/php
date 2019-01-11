<?php
namespace Facade;

require_once '../Outils.class.php';
require_once 'WebServiceAutoImpl.class.php';

$webServiceAuto = new WebServiceAutoImpl();
\Outils::println($webServiceAuto->document(0));
\Outils::println($webServiceAuto->document(1));

$resultats = $webServiceAuto->chercheVehicules(6000, 1000); 
if (count($resultats) > 0)
{
    \Outils::println('Véhicule(s) dont le prix est compris ' .
            'entre 5000 et 7000');
    foreach ($resultats as $resultat)
    {
        \Outils::println("   $resultat");
    }
}
?>
