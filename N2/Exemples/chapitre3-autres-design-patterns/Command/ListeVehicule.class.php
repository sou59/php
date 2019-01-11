<?php
namespace Command;

require_once 'Vehicule.class.php';

class ListeVehicule implements \IteratorAggregate {
    
    /**
     * 
     * @var \ArrayObject
     */
    private $vehicules;
    
    public function __construct(){
        $this->vehicules = new \ArrayObject();
    }
    
    /**
     * 
     * @param Vehicule $vehicule
     */
    public function append (Vehicule $vehicule) {
        $this->vehicules->append($vehicule);
    }
    
    public function getIterator () {
        return $this->vehicules->getIterator();
    }
}

?>
