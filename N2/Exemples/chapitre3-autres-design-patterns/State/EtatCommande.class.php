<?php
namespace State;

require_once 'Commande.class.php';
require_once 'Produit.class.php';

abstract class EtatCommande
{
    /**
     * 
     * @var Commande
     */
    protected $commande;

    /**
     * 
     * @param Commande $commande
     */
    public function __construct(Commande $commande)
    {
        $this->commande = $commande;
    }

    /**
     * 
     * @param Produit $produit
     */
    public abstract function ajouteProduit(Produit $produit);
    
    /**
     * @return void
     */
    public abstract function efface();
    
    /**
     * 
     * @param Produit $produit
     */
    public abstract function retireProduit(Produit $produit);
    
    /**
     * @return EtatCommande
     */
    public abstract function etatSuivant();
}


?>
