<?php
namespace Mediator;

require_once 'Formulaire.class.php';

abstract class Controle
{
    /**
     * @var string
     */
    protected $valeur = "";
    /**
     *
     * @var Formulaire
     */
    protected $directeur;
    /**
     * @var string
     */
    protected $nom;

    /**
     *
     * @param string $nom            
     */
    public function __construct($nom)
    {
        $this->setNom($nom);
    }

    /**
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     *
     * @param string $nom            
     */
    protected function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     *
     * @return Formulaire
     */
    protected function getDirecteur()
    {
        return $this->directeur;
    }

    /**
     *
     * @param Formulaire $directeur            
     */
    public function setDirecteur(Formulaire $directeur)
    {  
        $this->directeur = $directeur;
    }

    /**
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     *
     * @param string $valeur            
     */
    protected function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

    public abstract function saisie();

    protected function modifie()
    {
        $this->getDirecteur()->controleModifie($this);
    }
}

?>
