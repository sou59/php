<?php
class Forfait {
  protected   $nom       = null;
  protected   $data_max  = null;

  function __construct($nom, $data_max = null) {
    $this->nom      = $nom;
    $this->data_max = $data_max;
  }

  function getHtmlForfait() {
    return <<<"EOT"
    <span style=''>{$this->nom}</span>
EOT;
  }

}
