<?php
namespace Interpreter;

require_once 'OperateurOu.class.php';
require_once 'MotCle.class.php';

abstract class Expression
{

    /**
     * 
     * @var string
     */
    protected static $source;
    /**
     * 
     * @var int
     */
    protected static $index;
    /**
     * 
     * @var string
     */
    protected static $jeton;

    /**
     *
     * @param string $description            
     * @return boolean
     */
    public abstract function evalue($description);
    
    /**
     *
     * @return void
     */
    protected static function prochainJeton()
    {
        while ((Expression::$index < 
                 strlen(Expression::$source)) &&
                 (Expression::$source[Expression::$index] ==
                  ' '))
        {
            Expression::$index ++;
        }
        if (Expression::$index == strlen(Expression::$source))
        {
            Expression::$jeton = null;
        }
        elseif ((Expression::$source[Expression::$index]
                  == '(') ||
                 (Expression::$source[Expression::$index]
                   == ')'))
        {
            Expression::$jeton = substr(Expression::$source, 
                    Expression::$index, 1);
            Expression::$index ++;
        }
        else
        {
            $debut = Expression::$index;
            while ((Expression::$index <
                     strlen(Expression::$source)) &&
                     (Expression::$source[Expression::$index] !=
                     ' ') &&
                     (Expression::$source[Expression::$index] !=
                     ')'))
            {
                Expression::$index ++;
            }
            Expression::$jeton = substr(Expression::$source, 
                    $debut, Expression::$index - $debut);
        }
    }

    /**
     *
     * @param string $source            
     * @return Expression
     * @throws \Exception
     */
    public static function analyse($source)
    {
        Expression::$source = $source;
        Expression::$index = 0;
        Expression::prochainJeton();
        return OperateurOu::parse();
    }

    /**
     *
     * @return Expression
     * @throws \Exception
     */
    public static function parse()
    {
        $resultat = null;
        if (Expression::$jeton === '(')
        {
            Expression::prochainJeton();
            $resultat = OperateurOu::parse();
            if (!isset(Expression::$jeton))
            {
                throw new \Exception("Erreur de syntaxe");
            }
            if (Expression::$jeton !== ')')
            {
                throw new \Exception("Erreur de syntaxe");
            }
            Expression::prochainJeton();
        }
        else
        {
            $resultat = MotCle::parse();
        }
        return $resultat;
    }
}

?>
