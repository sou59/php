<?php
namespace Observer;

require_once 'Sujet.class.php';

class Vehicule extends Sujet
{
    /**
     * 
     * @var string
     */
    protected $description;
    /**
     * 
     * @var double
     */
    protected $prix;
    
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @param string $description            
     */
    public function setDescription($description)
    {
        $this->description = $description;
        $this->notifie();
    }

    /**
     *
     * @return double
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     *
     * @param double $prix            
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
        $this->notifie();
    }
}

?>
