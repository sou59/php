<?php
namespace Memento;

require_once 'OptionVehicule.class.php';

class ListeOptionVehicule implements \IteratorAggregate
{
    
    /**
     *
     * @var \ArrayObject
     */
    private $options;
    
    public function __construct() {
        $this->options = new \ArrayObject();
    }
    
    public function clear()
    {
        $this->options = new \ArrayObject();
    }

    /**
     * 
     * @param OptionVehicule $option
     */
    public function add(OptionVehicule $option)
    {
        $this->options->append($option);
    }

    /**
     * 
     * @param ListeOptionVehicule $options
     */
    public function addAll(ListeOptionVehicule $options)
    {
        if (isset($options)) {
            foreach($options as $o) {
                $this->options->append($o);
            }
        }
    }
    
    /**
     * 
     * @param OptionVehicule $option
     */
    public function remove(OptionVehicule $option) {
        foreach ($this->options as $key => $val) {
            if ($val == $option) {
                $this->options->offsetUnset($key);
                break;
            }
        }
    }
    
    /**
     * 
     * @param ListeOptionVehicule $options
     */
    public function removeAll(ListeOptionVehicule $options) {
        foreach ($options as $option) {
            $this->remove($option);
        }
    }
    
    /**
     * 
     * @param OptionVehicule $option
     * @return boolean
     */
    public function contains(OptionVehicule $option) {
        foreach ($this->options as $key => $val) {
            if ($val == $option) {
                return true;
            }
        }
        return false;
    }
    
    public function getIterator () {
        return $this->options->getIterator();
    }
}

?>
