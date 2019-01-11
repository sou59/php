<?php
namespace FactoryMethod;

require_once '../Outils.class.php';
require_once 'Commande.class.php';

class CommandeCredit extends Commande
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
                'Le paiement de la commande au crédit de : ' .
                number_format($this->montant, 2, ',', ' ') . 
                ' est effectué.');
    }

    public function valide()
    {
        return ($this->montant >= 1000.0) &&
                 ($this->montant <= 5000.0);
    }
}

?>
