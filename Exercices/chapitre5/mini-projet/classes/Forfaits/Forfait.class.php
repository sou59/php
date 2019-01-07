<?php


abstract class Forfait {
  protected $nom       = null;
  protected $telephone = null;
  protected $data_max  = null;
  protected $data_used = null;

  function __construct($nom, Telephone $telephone, $data_max = null) {
    $this->nom       = $nom;
    $this->telephone = $telephone;
    $this->data_max  = $data_max;
    
    if (!is_null($this->data_max)) {
      $this->data_used = 0;
    }
  }
  
  function utiliserData($qty) {
    if ($this->data_used + $qty <= $this->data_max) {
      $this->data_used+=$qty;
      return true;
    } else {
      return false;
    }
  }
  
  function getForfaitName() {
    return ucfirst($this->nom);
  }
  
  function getPhoneNumber() {
    return (string) $this->telephone;
  }
  
  function getTelephone() {
    return $this->telephone;
  }
  
  function getDataUsed() {
    if (is_null($this->data_max)) {
      return "Pas de data";
    } else {
      $data_used_megabytes = $this->data_used /1024/1024;
      $data_max_megabytes  = $this->data_max  /1024/1024;
      return sprintf('%.2f / %.2f', $data_used_megabytes, $data_max_megabytes);
    }
  }
}
