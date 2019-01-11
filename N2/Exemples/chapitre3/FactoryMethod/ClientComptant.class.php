<?php
namespace FactoryMethod;

require_once 'Client.class.php';
require_once 'CommandeComptant.class.php';

class ClientComptant extends Client
{

    protected function creeCommande($montant)
    {
        return new CommandeComptant($montant);
    }
}

?>

