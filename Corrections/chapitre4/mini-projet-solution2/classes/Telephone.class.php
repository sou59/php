<?php

class Telephone {
  protected $numero;
  static protected $traductions = array(
		'01' => 'Région parisienne',
		'02' => 'Région nord-ouest et « Océan Indien »',
		'03' => 'Région nord-est',
		'04' => 'Région sud-est dont Corse',
		'05' => 'Région sud-ouest et « Océan Atlantique »',
		'06' => 'Téléphone mobile',
		'07' => 'Téléphone mobile',
		'08' => 'Numéro spéciaux',
		'09' => 'Numéro spéciaux',
		'default' => 'Pas de zone'
  );
  
  function __construct($numero) {
    $this->numero = $numero;
  }
  
  function __toString() {
    return $this->numero;
  }
  
  function getHtmlZoneGeo() {
		$prefix = substr($this->numero, 0, 2);
    if (isset(self::$traductions[$prefix])) {
      return self::$traductions[$prefix];
    } else {
      self::$traductions['default'];
    }
  }
}