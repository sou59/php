<?php
namespace ChainOfResponsibility;

require_once 'ObjetBase.class.php';

class Modele extends ObjetBase
{
    /**
     * 
     * @var string
     */
    protected $description;
    /**
     * 
     * @var string
     */
    protected $nom; 
    
    /**
     *
     * @param string $nom            
     * @param string $description            
     */
    public function __construct($nom, $description=null)
    {
        $this->description = $description;
        $this->nom = $nom;
    }

    protected function getDescription()
    {
        if (isset($this->description)) {
            return "Modèle $this->nom : $this->description";
        } 
        else
        {
            return null;
        }
    }
}

?>
