<?php
namespace AbstractFactory;

abstract class Automobile
{
    /**
     * 
     * @var string
     */
    protected $modele;
    /**
     * 
     * @var string
     */
    protected $couleur;
    /**
     * 
     * @var int
     */
    protected $puissance;
    /**
     * 
     * @var double
     */
    protected $espace;
    
    /**
     *
     * @param string $modele            
     * @param string $couleur            
     * @param int $puissance            
     * @param double $espace            
     */
    public function __construct($modele, $couleur, $puissance, 
            $espace)
    {
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->puissance = $puissance;
        $this->espace = $espace;
    }

    public abstract function afficheCaracteristiques();
}

?>
