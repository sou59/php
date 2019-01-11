<?php
namespace Interpreter;

require_once '../Outils.class.php';
require_once 'Expression.class.php';


$expressionRequete = null;
$requete = \Outils::readln('Entrez votre requête : ');
try
{
    $expressionRequete = Expression::analyse($requete);
}
catch (\Exception $e)
{
    \Outils::println($e->getMessage());
    $expressionRequete = null;
}
if (isset($expressionRequete))
{
    $description = \Outils::readln(
            'Entrez le texte de description d\'un véhicule : ');
    if ($expressionRequete->evalue($description))
    {
        \Outils::println('La description répond à la requête');
    }
    else
    {
        \Outils::println(
                'La description ne répond pas à la requête');
    }
}

?>
