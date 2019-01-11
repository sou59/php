<?php
namespace Visitor;

require_once 'Visiteur.class.php';

abstract class Societe
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
    protected $email;
    /**
     * 
     * @var string
     */
    protected $adresse;

    /**
     * 
     * @param string $nom
     * @param string $email
     * @param string $adresse
     */
    public function __construct($nom, $email, $adresse)
    {
        $this->setNom($nom);
        $this->setEmail($email);
        $this->setAdresse($adresse);
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * 
     * @param string $nom
     */
    protected function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * 
     * @param string $email
     */
    protected function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * 
     * @param string $adresse
     */
    protected function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @param Societe $filiale
     * @return boolean
     */
    public abstract function ajouteFiliale(Societe $filiale);

    /**
     * 
     * @param Visiteur $visiteur
     */
    public abstract function accepteVisiteur(Visiteur $visiteur);

}

?>
