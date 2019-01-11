<?php
namespace Prototype;

abstract class Liasse implements \IteratorAggregate
{
    /**
     * 
     * @var \ArrayObject
     */
    protected $documents;

    
    public function getIterator () {
        return $this->documents->getIterator();
    }
    
}
?>
