<?php
namespace State;

require_once 'CommandeEnCours.class.php';
require_once 'Produit.class.php';
require_once 'ListeProduit.class.php';
require_once '../Outils.class.php';

class Commande
{
    /**
     * @var ListeProduit
     */
    protected $produits;
    /**
     * 
     * @var EtatCommande
     */
    protected $etatCommande;

    public function __construct()
    {
        $this->produits = new ListeProduit();
        $this->etatCommande = new CommandeEnCours($this);
    }

    /**
     * 
     * @param Produit $produit
     */
    public function ajouteProduit(Produit $produit)
    {
        $this->etatCommande->ajouteProduit($produit);
    }

    /**
     * 
     * @param Produit $produit
     */
    public function retireProduit(Produit $produit)
    {
        $this->etatCommande->retireProduit($produit);
    }

    public function efface()
    {
        $this->etatCommande->efface();
    }

    public function etatSuivant()
    {
        $this->etatCommande = $this->etatCommande->etatSuivant();
    }

    /**
     * @return ListeProduit
     */
    public function getProduits()
    {
        return $this->produits;
    }

    public function affiche()
    {
        \Outils::println('Contenu de la commande');
        foreach ($this->produits as $produit) {
            $produit->affiche();
        }
        \Outils::println();
    }
}

?>
