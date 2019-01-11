<?php
namespace State;

require_once 'Commande.class.php';
require_once 'Produit.class.php';
require_once 'EtatCommande.class.php';
require_once 'CommandeLivree.class.php';

class CommandeValidee extends EtatCommande
{
    /**
     * 
     * @param Commande $commande
     */
    public function __construct(Commande $commande)
    {
        parent::__construct($commande);
    }
    
    public function ajouteProduit(Produit $produit){}

    public function efface()
    {
        $this->commande->getProduits()->clear();
    }

    public function retireProduit(Produit $produit){}

    public function etatSuivant()
    {
        return new CommandeLivree($this->commande);
    }
}


?>
