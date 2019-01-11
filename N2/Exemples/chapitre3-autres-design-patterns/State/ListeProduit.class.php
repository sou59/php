<?php
namespace State;

require_once 'Produit.class.php';

class ListeProduit implements \IteratorAggregate
{
    
    /**
     *
     * @var \ArrayObject
     */
    protected $produits;

    public function __construct() {
        $this->produits = new  \ArrayObject();
    }
    
    /**
     * 
     * @param Produit $produit
     */
    public function add(Produit $produit)
    {
        $this->produits->append($produit);
    }
    
    /**
     * 
     */
    public function clear() {
        $this->produits = new  \ArrayObject();
    }

    /**
     * 
     * @param Produit $produit
     */
    public function remove(Produit $produit) {
        foreach ($this->produits as $key => $val) {
            if ($val == $produit) {
                $this->produits->offsetUnset($key);
                break;
            }
        }
    }
    
    public function getIterator () {
        return $this->produits->getIterator();
    }
}

?>
