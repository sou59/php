<?php

abstract class Personne {
	public $nom;
}

class Client extends Personne {
	
}

class Salarie extends Personne {
	
}

$personne = new Personne();
$client   = new Client();
$salarie  = new Salarie();

$client->nom  = 'Client';
$salarie->nom = 'Salarié';

var_dump($personne, $client, $salarie);
