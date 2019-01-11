<?php
namespace Strategy;

require_once '../Outils.class.php';

class VueVehicule
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
    public function __construct($description)
    {
        $this->description = $description;
    }

    /**
     * @return void
     */
    public function dessine()
    {
        \Outils::prt($this->description);
    }
}


?>
