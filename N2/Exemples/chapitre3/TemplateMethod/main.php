<?php
namespace TemplateMethod;

require_once 'CommandeFrance.class.php';
require_once 'CommandeLuxembourg.class.php';

$commandeFrance = new CommandeFrance();
$commandeFrance->setMontantHt(10000);
$commandeFrance->calculeMontantTtc();
$commandeFrance->affiche();

$commandeLuxembourg = new CommandeLuxembourg();
$commandeLuxembourg->setMontantHt(10000);
$commandeLuxembourg->calculeMontantTtc();
$commandeLuxembourg->affiche();

?>
