<?php
namespace Interpreter;

require_once 'OperateurBinaire.class.php';
require_once 'Expression.class.php';

class OperateurEt extends OperateurBinaire
{

    /**
     * 
     * @param Expression $operandeGauche
     * @param Expression $operandeDroite
     */
    public function __construct(Expression $operandeGauche, 
            Expression $operandeDroite)
    {
        parent::__construct($operandeGauche, $operandeDroite);
    }

    public function evalue($description)
    {
        return $this->operandeGauche->evalue($description) &&
                 $this->operandeDroite->evalue($description);
    }
    
    /**
     *
     * @return Expression
     * @throws \Exception
     */
    public static function parse()
    {
        $resultatGauche = Expression::parse();
        while (isset(OperateurEt::$jeton) &&
                 (OperateurEt::$jeton === 'et'))
        {
            OperateurEt::prochainJeton();
            $resultatDroit = Expression::parse();
            $resultatGauche = new OperateurEt($resultatGauche, 
                    $resultatDroit);
        }
        return $resultatGauche;
    }
}

?>
