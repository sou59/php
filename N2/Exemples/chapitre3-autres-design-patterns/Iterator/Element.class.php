<?php
namespace Iterator;

abstract class Element
{
    /**
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
     *
     * @param string $motCle            
     * @return boolean
     */
    public function motCleValide($motCle)
    {
        return strstr($this->description, $motCle) !== FALSE;
    }
}

?>
