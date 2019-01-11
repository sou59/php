<?php
namespace Interpreter;

require_once 'Expression.class.php';

class MotCle extends Expression
{
    /**
     * 
     * @var string
     */
    protected $motCle;

    /**
     *
     * @param string $motCle            
     */
    public function __construct($motCle)
    {
        $this->motCle = $motCle;
    }

    public function evalue($description)
    {
        return strpos($description, $this->motCle) !== FALSE;
    }
    
    /**
     *
     * @return Expression
     */
    public static function parse()
    {
        $resultat = new MotCle(MotCle::$jeton);
        MotCle::prochainJeton();
        return $resultat;
    }
}

?>
