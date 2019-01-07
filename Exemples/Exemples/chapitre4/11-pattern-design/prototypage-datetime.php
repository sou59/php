<?php

$date_debut = new DateTime();
//$date_fin   = new DateTime($date_debut->format("Y-m-d H:i:s"));
$date_fin   = clone $date_debut;
$date_fin->modify("+1 hour");

var_dump($date_debut, $date_fin);