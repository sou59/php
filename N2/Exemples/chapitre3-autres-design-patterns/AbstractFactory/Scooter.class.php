<?php
namespace AbstractFactory;

abstract class Scooter
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
     * @param string $modele            
     * @param string $couleur            
     * @param int $puissance            
     */
    public function __construct($modele, $couleur, $puissance)
    {
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->puissance = $puissance;
    }

    public abstract function afficheCaracteristiques();
}

?>
