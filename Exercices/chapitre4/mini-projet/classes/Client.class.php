<?php
class Client {
  protected $civilite;
  protected $prenom;
  protected $nom;

  function __construct($civilite, $prenom, $nom) {
    $this->civilite = $civilite;
    $this->prenom   = $prenom;
    $this->nom      = $nom;
  }

  function getHtmlFullName() {
      return <<<"EOT"
      <span style=''>{$this->civilite}</span>
      <span style='text-transform:capitalize;'>{$this->prenom}</span>
      <span style='text-transform:capitalize;font-variant:small-caps;'>{$this->nom}</span>
EOT;
  }
}

