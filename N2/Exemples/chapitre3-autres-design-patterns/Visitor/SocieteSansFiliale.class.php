<?php
namespace Visitor;

require_once 'Societe.class.php';
require_once 'Visiteur.class.php';

class SocieteSansFiliale extends Societe
{
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
        $visiteur->visiteSocieteSansFiliale($this);
    }

    public function ajouteFiliale(Societe $filiale)
    {
        return false;
    }

}

?>
