<?php
namespace Iterator;


class Catalogue
{
     /**
     * 
     * @var "liste d'Element"
     */
    protected $contenu;

    public function __construct()
    {
        $this->contenu = array();
    }
    
    /**
     *
     * @param Element $e            
     */
    function ajoute(Element $e) {
        $this->contenu[] = $e;
    }

    /**
     * 
     * @param string $motCleRequete
     * @return Iterateur
     */
    public function recherche($motCleRequete)
    {
        $resultat = new Iterateur();
        $resultat->setMotCleRequete($motCleRequete, $this->contenu);
        return $resultat;
    }
}
?>
