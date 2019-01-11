<?php
class Client {
  protected $civilite;
  protected $prenom;
  protected $nom;
  protected $telephone;
  protected $zone;
  public $forfait = null;

  function __construct($civilite, $prenom, $nom, $telephone, $zone, Forfait $forfait) {
    $this->civilite = $civilite;
    $this->prenom   = $prenom;
    $this->nom      = $nom;
    $this->telephone = $telephone;
    $this->zone = $zone;
    $this->forfait = $forfait;
  }

  function getHtmlFullName() {
      return <<<"EOT"
      <span style=''>{$this->civilite}</span>
      <span style='text-transform:capitalize;'>{$this->prenom}</span>
      <span style='text-transform:capitalize;font-variant:small-caps;'>{$this->nom}</span>
EOT;
  }

  function getHtmlTelephone() {
    return <<<"EOT"
    <span style=''>{$this->telephone}</span>
EOT;
  }

  function getHtmlZone() {
    return <<<"EOT"
    <span style=''>{$this->zone}</span>
EOT;
  }

  function getForfait(): Forfait {
    return $this->forfait;
  }

}


