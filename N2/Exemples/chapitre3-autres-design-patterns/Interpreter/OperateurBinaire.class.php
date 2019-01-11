<?php
namespace Interpreter;

require_once 'Expression.class.php';

abstract class OperateurBinaire extends Expression
{
    /** 
     * @var Expression 
     */
    protected $operandeGauche;
    /**
     * @var Expression
     */
    protected $operandeDroite;

    /**
     * 
     * @param Expression $operandeGauche
     * @param Expression $operandeDroite
     */
    public function __construct(Expression $operandeGauche,
             Expression $operandeDroite)
    {
        $this->operandeGauche = $operandeGauche;
        $this->operandeDroite = $operandeDroite;
    }
}


?>
