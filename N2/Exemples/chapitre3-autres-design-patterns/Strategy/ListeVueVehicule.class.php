<?php
namespace Strategy;

require_once 'VueVehicule.class.php';


class ListeVueVehicule implements \IteratorAggregate {
    
    /**
     * 
     * @var \ArrayObject
     */
    private $vuesVehicule;
    
    public function __construct(){
        $this->vuesVehicule = new \ArrayObject();
    }
    
    public function append (VueVehicule $value ) {
        $this->vuesVehicule->append($value);
    }
    
    public function getIterator () {
        return $this->vuesVehicule->getIterator();
    }
}

?>
