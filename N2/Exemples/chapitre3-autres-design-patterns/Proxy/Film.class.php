<?php
namespace Proxy;

require_once '../Outils.class.php';

class Film implements Animation
{
    public function clic(){}

    public function dessine()
    {
        \Outils::println('Affichage du film');
    }

    public function charge()
    {
        \Outils::println('Chargement du film');
    }

    public function joue()
    {
        \Outils::println('Lecture du film');
    }
}


?>
