<?php
namespace ChainOfResponsibility;

require_once 'ObjetBase.class.php';

class Vehicule extends ObjetBase
{
    /**
     * 
     * @var string
     */
    protected $description;

    /**
     *
     * @param string $description            
     */
    public function __construct($description = null)
    {
        $this->description = $description;
    }

    protected function getDescription()
    {
        return $this->description;
    }
}

?>
