<?php

namespace App\Forfaits;

abstract class ForfaitAbstract
{

    protected $nom;
    protected $data_max;
    protected $data_used;

    public function __construct($nom, $data_max = null)
    {
        $this->nom = $nom;
        $this->data_max = $data_max;

        if (!is_null($this->data_max)) {
            $this->data_used = 0;
        }
    }

    public function utiliserData($qty)
    {
        if ($this->data_used + $qty <= $this->data_max) {
            $this->data_used+=$qty;
            return true;
        } else {
            return false;
        }
    }

    public function getForfaitName()
    {
        return ucfirst($this->nom);
    }

    public function getDataUsed()
    {
        if (is_null($this->data_max)) {
            return "Pas de data";
        } else {
            return ( ((int) ($this->data_used / 1024 / 1024 * 100)) / 100 ) . ' / ' . ($this->data_max / 1024 / 1024);
        }
    }

    public function getDataUsedOctet()
    {
        return $this->data_used;
    }
}
