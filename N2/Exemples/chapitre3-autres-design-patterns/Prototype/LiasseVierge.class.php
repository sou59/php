<?php
namespace Prototype;

require_once 'Liasse.class.php';

class LiasseVierge extends Liasse
{
    /**
     * @var LiasseVierge
     */
    private static $_instance = null;

    private function __construct()
    {
        $this->documents = new \ArrayObject();
    }

    /**
     * 
     * @return LiasseVierge
     */
    public static function Instance()
    {
        if (!isset(LiasseVierge::$_instance))
        {
            LiasseVierge::$_instance = new LiasseVierge();
        }
        return LiasseVierge::$_instance;
    }

    /**
     * 
     * @param Document $doc
     */
    public function ajoute(Document $doc)
    {
        $this->documents[] = $doc;
    }

    /**
     * 
     * @param Document $doc
     */
    public function retire(Document $doc)
    {
        $index = null;
        foreach ($this->documents as $key => $value) {
            if ($doc === $value) {
                $index = $key;
            }
        }
        if (isset($index)) {
            $this->documents->offsetUnset($index);
        }
    }
}


?>
