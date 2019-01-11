<?php
namespace State;

require_once 'Commande.class.php';
require_once 'Produit.class.php';
require_once 'EtatCommande.class.php';
require_once 'CommandeValidee.class.php';

class CommandeEnCours extends EtatCommande
{
    /**
     * 
     * @param Commande $commande
     */
    public function __construct(Commande $commande)
    {
        parent::__construct($commande);
    }

    public function ajouteProduit(Produit $produit)
    {
        $this->commande->getProduits()->add($produit);
    }

    public function efface()
    {
        $this->commande->getProduits()->clear();
    }

    public function retireProduit(Produit $produit)
    {
        $this->commande->getProduits()->remove(produit);
    }

    public function etatSuivant()
    {
        return new CommandeValidee($this->commande);
    }
}

?>
