<?php
namespace TemplateMethod;

require_once '../Outils.class.php';

abstract class Commande
{
    /**
     * 
     * @var double
     */
    protected $montantHt;
    /**
     * 
     * @var double
     */
    protected $montantTva;
    /**
     * 
     * @var double
     */
    protected $montantTtc;

    /**
     * @return void
     */
    protected abstract function calculeTva();

    public function calculeMontantTtc()
    {
        $this->calculeTva();
        $this->montantTtc = $this->montantHt + $this->montantTva;
    }

    /**
     * 
     * @param double $montantHt
     */
    public function setMontantHt($montantHt)
    {
        $this->montantHt = $montantHt;
    }

    public function affiche()
    {
        \Outils::println("Commande");
        \Outils::println('Montant HT ' . 
                number_format($this->montantHt, 2, ',', ' '));
        \Outils::println('Montant TTC ' .
                number_format($this->montantTtc, 2, ',', ' '));
    }
}


?>
