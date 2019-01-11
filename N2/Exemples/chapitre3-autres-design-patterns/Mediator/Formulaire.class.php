<?php
namespace Mediator;

require_once 'Controle.class.php';

class Formulaire
{
    /**
     * @var "Liste de Controle"
     */
    protected $controles = array();
    /**
     * @var "Liste de Controle"
     */
    protected $controlesCoemprunteur = array();
    /**
     * @var PopupMenu
     */
    protected $menuCoemprunteur;
    /**
     * @var Bouton
     */
    protected $boutonOK;
    /**
     * @var boolean
     */
    protected $enCours = true;

    /**
     *
     * @param Controle $controle            
     */
    public function ajouteControle(Controle $controle)
    {
        $this->controles[] = $controle;
        $controle->setDirecteur($this);
    }

    /**
     *
     * @param Controle $controle            
     */
    public function ajouteControleCoemprunteur(Controle $controle)
    {
        $this->controlesCoemprunteur[] = $controle;
        $controle->setDirecteur($this);
    }

    /**
     *
     * @param PopupMenu $menuCoemprunteur            
     */
    public function setMenuCoemprunteur(PopupMenu $menuCoemprunteur)
    {
        $this->menuCoemprunteur = $menuCoemprunteur;
    }

    /**
     *
     * @param Bouton $boutonOK            
     */
    public function setBoutonOK(Bouton $boutonOK)
    {
        $this->boutonOK = $boutonOK;
    }

    /**
     *
     * @param Controle $controle            
     */
    public function controleModifie(Controle $controle)
    {
        if ($controle == $this->menuCoemprunteur)
        {
            if ($controle->getValeur() === 'avec coemprunteur')
            {
                foreach ($this->controlesCoemprunteur as $elementCoemprunteur)
                    $elementCoemprunteur->saisie();
            }
        }
        if ($controle === $this->boutonOK)
        {
            $this->enCours = false;
        }
    }

    public function saisie()
    {
        while (true)
        {
            foreach ($this->controles as $controle)
            {
                $controle->saisie();
                if (! $this->enCours)
                    return;
            }
        }
    }
}

?>
