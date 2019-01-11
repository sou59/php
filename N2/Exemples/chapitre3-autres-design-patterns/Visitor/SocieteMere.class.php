<?php
namespace Visitor;

require_once 'Societe.class.php';
require_once 'Visiteur.class.php';

class SocieteMere extends Societe
{
    /**
     * 
     * @var "Liste de Societe"
     */
    protected $filiales = array();

    /**
     * 
     * @param string $nom
     * @param string $email
     * @param string $adresse
     */
    public function __construct($nom, $email, $adresse)
    {
        parent::__construct($nom, $email, $adresse);
    }
    
    public function accepteVisiteur(Visiteur $visiteur)
    {
        $visiteur->visiteSocieteMere($this);
        foreach ($this->filiales as $filiale)
        {
            $filiale->accepteVisiteur($visiteur);
        }
    }

    public function ajouteFiliale(Societe $filiale)
    {
        return $this->filiales[] = $filiale;
    }
}


?>
