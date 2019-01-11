<?php
namespace FactoryMethod;

require_once 'ClientComptant.class.php';
require_once 'ClientCredit.class.php';

$client = new ClientComptant();
$client->nouvelleCommande(2000.0);
$client->nouvelleCommande(10000.0);

$client = new ClientCredit();
$client->nouvelleCommande(2000.0);
$client->nouvelleCommande(10000.0);

?>
