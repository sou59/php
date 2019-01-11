<?php
namespace Interpreter;

require_once 'OperateurBinaire.class.php';
require_once 'OperateurEt.class.php';
require_once 'Expression.class.php';

class OperateurOu extends OperateurBinaire
{
    /**
     * 
     * @param Expression $operandeGauche
     * @param Expression $operandeDroite
     */
    public function __construct($operandeGauche, $operandeDroite)
    {
        parent::__construct($operandeGauche, $operandeDroite);
    }

    public function evalue($description)
    {
        return $this->operandeGauche->evalue($description) ||
        $this->operandeDroite->evalue($description);
    }

    /**
     * 
     * @return Expression
     * @throws \Exception
     */
    public static function parse()
    {
        $resultatGauche = OperateurEt::parse();
        while ((isset(OperateurOu::$jeton))
                && (OperateurOu::$jeton === 'ou'))
        {
            OperateurOu::prochainJeton();
            $resultatDroit = OperateurEt::parse();
            $resultatGauche = new OperateurOu($resultatGauche,
            $resultatDroit);
        }
        return $resultatGauche;
    }
}


?>
