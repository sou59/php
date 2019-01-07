<?php
class Clients {
	protected $prototype = true;
	protected $name      = null;

	function __clone() {
		$this->prototype = false;
	}
	function setName($name) {
		$this->name = $name;
	}
}

$protoClient = new Clients(); // Création du client type
// ... Ajouter des données communes à tous les clients

$clientA = clone $protoClient;
$clientA->setName('Albert');

$clientB = clone $protoClient;
$clientB->setName('Bob');

$clientC = clone $protoClient;
$clientC->setName('Alice');

var_dump($protoClient, $clientA, $clientB, $clientC);
