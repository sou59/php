<?php

namespace Adapter;

require_once '..\Outils.class.php';
require_once 'DocumentHtml.class.php';
require_once 'DocumentPdf.class.php';

$document1 = new DocumentHtml();
$document1->setContenu('Hello');
$document1->dessine();

\Outils::println(); 

$document2 = new DocumentPdf();
$document2->setContenu('Bonjour');
$document2->dessine();

?>
