<?php
namespace Command;

require_once '../Outils.class.php';

class Vehicule
{
    /**
     * 
     * @var string
     */
    protected $nom;
    /**
     * 
     * @var long
     */
    protected $dateEntreeStock; 
    /**
     * 
     * @var double
     */
    protected $prixVente; 
    
    /**
     *
     * @param string $nom            
     * @param long $dateEntreeStock            
     * @param double $prixVente            
     */
    public function __construct($nom, $dateEntreeStock, 
            $prixVente)
    {
        $this->nom = $nom;
        $this->dateEntreeStock = $dateEntreeStock;
        $this->prixVente = $prixVente;
    }

    /**
     *
     * @param long $aujourdhui            
     * @return long
     */
    public function getDureeStockage($aujourdhui)
    {
        return $aujourdhui - $this->dateEntreeStock;
    }

    /**
     *
     * @param double $coefficient            
     */
    public function modifiePrix($coefficient)
    {
        $this->prixVente = round(
                $coefficient * $this->prixVente, 2);
    }

    public function affiche()
    {
        \Outils::println("$this->nom  prix : " .
                number_format($this->prixVente, 2, ',', ' ') .
                " date entrée Stock $this->dateEntreeStock");
    }
}

?>
