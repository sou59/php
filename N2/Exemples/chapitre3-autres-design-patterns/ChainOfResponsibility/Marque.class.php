<?php
namespace ChainOfResponsibility;

require_once 'ObjetBase.class.php';

class Marque extends ObjetBase
{
    /**
     * 
     * @var string
     */
    protected $description1;
    /**
     * 
     * @var string
     */
    protected $description2;
    /**
     * 
     * @var string
     */
    protected $nom;
    
    /**
     *
     * @param string $nom            
     * @param string $description1            
     * @param string $description2            
     */
    public function __construct($nom, $description1, 
            $description2)
    {
        $this->description1 = $description1;
        $this->description2 = $description2;
        $this->nom = $nom;
    }

    protected function getDescription()
    {
        if ((isset($this->description1)) &&
                 (isset($this->description2)))
        {
            return "Marque $this->nom : $this->description1 " .
                $this->description2;
        }
        else
        {
            if (isset($this->description1))
            {
                return 'Marque ' + $this->nom + ' : ' +
                         $this->description1;
            }
            else
            {
                return null;
            }
        }
    }
}

?>
