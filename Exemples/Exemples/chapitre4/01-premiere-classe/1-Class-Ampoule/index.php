<?php
require('Ampoule.class.php');

$instance = new Ampoule();
var_dump($instance); die();

$instance->changerCouleur('rouge');
echo $instance->recupererCouleur();
echo "\n<br />"; // Afficher un saut de ligne

$instance->changerCouleur('bleu');
echo $instance->recupererCouleur();