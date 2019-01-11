<?php
namespace State;

require_once '../Outils.class.php';
class Produit
{
    /**
     * 
     * @var string
     */
    protected $nom;

    /**
     * 
     * @param string $nom
     */
    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function affiche()
    {
        \Outils::println("Produit : $this->nom");
    }
}


?>
