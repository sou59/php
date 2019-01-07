<?php
require('Ampoule.class.php');

$instance = new Ampoule();
$instance->changerCouleur('rouge');
echo $instance->recupererCouleur();
echo "\n<br />"; // Afficher un saut de ligne

$instance->changerCouleur('bleu');
echo $instance->recupererCouleur();