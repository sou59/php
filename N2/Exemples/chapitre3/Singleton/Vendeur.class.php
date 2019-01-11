<?php
namespace Singleton;

require_once '../Outils.class.php';

class Vendeur
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
    protected $adresse;
    /**
     * 
     * @var string
     */
    protected $email;

    /**
     * @var Vendeur
     */
    private static $instance = null;

    /**
     * constructeur de visibilité privée
     */
    private function __construct()
    {
    }
    
    /**
     * constructeur lors d'un « clone »
     */
    private function __clone()
    {
    }
    
    /**
     * constructeur lors d'un « unserialize() »
     */
    private function __wakeup()
    {
    }

    /**
     * @return Vendeur
     */
    public static function Instance()
    {
        if (!isset(Vendeur::$instance)) {
            Vendeur::$instance = new Vendeur();
        }
        return Vendeur::$instance;
    }

    public function affiche()
    {
        \Outils::println("Nom : $this->nom");
        \Outils::println("Adresse : $this->adresse");
        \Outils::println("Email : $this->email");
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
    public function setNom($nom)
    {
        $this->nom = $nom;
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
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
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
    public function setEmail($email)
    {
        $this->email = $email;
    }

}

?>
