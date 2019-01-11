<?php
namespace ChainOfResponsibility;

abstract class ObjetBase
{
    /**
     * 
     * @var ObjetBase
     */
    protected $suivant;
    
    /**
     * @return string
     */
    private function descriptionParDefaut()
    {
        return 'description par défaut';
    }
    
    /**
     * @return NULL|string
     */
    protected abstract function getDescription();
    
    /**
     * @return string
     */
    public function donneDescription()
    {
        $resultat = $this->getDescription();
        if (isset($resultat))
        {
            return $resultat;
        }
        if (isset($this->suivant))
        {
            return $this->suivant->donneDescription();
        }
        else
        {
            return $this->descriptionParDefaut();
        }
    }

    /**
     *
     * @param ObjetBase $suivant            
     */
    public function setSuivant(ObjetBase $suivant)
    {
        $this->suivant = $suivant;
    }
}

?>
