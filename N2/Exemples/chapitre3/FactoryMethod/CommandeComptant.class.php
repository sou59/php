<?php
namespace FactoryMethod;

require_once '../Outils.class.php';
require_once 'Commande.class.php';

class CommandeComptant extends Commande
{

    /**
     *
     * @param double $montant            
     */
    public function __construct($montant)
    {
        parent::__construct($montant);
    }

    public function paye()
    {
        \Outils::println(
                'Le paiement de la commande au comptant de : ' .
                 number_format($this->montant, 2, ',', ' ')
                 . ' est effectué.');
    }

    public function valide()
    {
        return true;
    }
}

?>
