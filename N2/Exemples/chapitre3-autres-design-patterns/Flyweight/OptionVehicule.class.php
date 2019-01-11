<?php
namespace Flyweight;

require_once '../Outils.class.php';

class OptionVehicule
{
    /**
     * 
     * @var string
     */
    protected $nom;
    /**
     * 
     * @var string
     */
    protected $description;
    /**
     * 
     * @var int
     */
    protected $prixStandard; 
    
    /**
     *
     * @param string $nom            
     */
    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->description = "Description de $nom";
        $this->prixStandard = 100;
    }

    /**
     *
     * @param int $prixDeVente            
     */
    public function affiche($prixDeVente)
    {
        \Outils::println('Option');
        \Outils::println("Nom : $this->nom");
        \Outils::println($this->description);
        \Outils::println(
                "Prix standard : $this->prixStandard");
        \Outils::println("Prix de vente : $prixDeVente");
    }
}

?>
