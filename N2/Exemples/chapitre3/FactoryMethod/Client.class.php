<?php
namespace FactoryMethod;

abstract class Client
{
    /**
     * 
     * @var "Liste de Commande"
     */
    protected $commandes = array();
    
    /**
     *
     * @param double $montant            
     * @return Commande
     */
    protected abstract function creeCommande($montant);

    /**
     *
     * @param double $montant            
     */
    public function nouvelleCommande($montant)
    {
        $commande = $this->creeCommande($montant);
        if ($commande->valide())
        {
            $commande->paye();
            $this->commandes[] = $commande;
        }
    }
}

?>
