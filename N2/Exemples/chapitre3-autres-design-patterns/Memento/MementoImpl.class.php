<?php
namespace Memento;

require_once 'Memento.class.php';
require_once 'ListeOptionVehicule.class.php';

class MementoImpl implements Memento
{
    /**
     * @var ListeOptionVehicule
     */
    protected $options;

    
    public function __construct() {
        $this->options = new ListeOptionVehicule();
    }
    
    /**
     * 
     * @param ListeOptionVehicule $options
     */
    public function setEtat(ListeOptionVehicule $options)
    {
        $this->options->clear();
        $this->options->addAll($options);
    }

    /**
     * 
     * @return ListeOptionVehicule
     */
    public function getEtat()
    {
        return $this->options;
    }
}


?>
