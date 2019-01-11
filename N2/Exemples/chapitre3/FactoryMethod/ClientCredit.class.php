<?php
namespace FactoryMethod;

require_once 'Client.class.php';
require_once 'CommandeCredit.class.php';

class ClientCredit extends Client
{

    protected function creeCommande($montant)
    {
        return new CommandeCredit($montant);
    }
}

?>
