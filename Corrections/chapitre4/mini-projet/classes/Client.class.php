<?php
class Client {
	protected $params = array();
	protected $lignes = array();

	function __construct($civilite, $prenom, $nom) {
		$this->params['civilite'] = $civilite;
		$this->params['prenom']   = $prenom;
		$this->params['nom']      = $nom;
	}

	function ajouterLigne($numero, $forfait) {
		$className = "Forfait".ucfirst($forfait);
		$this->lignes["$numero"] = new $className($numero);
		return $this;
	}
	
	function getLignes() {
		return $this->lignes;
	}
	
	function utiliserData($numLigne, $qty) {
	      return $this->lignes["$numLigne"]->utiliserData($qty);
	}
	
	function getFullName() {
   	return <<<"EOT"
		<span style=''>{$this->params['civilite']}</span>
		<span style='text-transform:capitalize;'>{$this->params['prenom']}</span>
		<span style='text-transform:capitalize;font-variant:small-caps;'>{$this->params['nom']}</span>
EOT;
	}
}

