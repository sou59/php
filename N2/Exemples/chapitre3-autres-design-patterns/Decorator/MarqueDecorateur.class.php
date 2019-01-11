<?php
namespace Decorator;

require_once '../Outils.class.php';
require_once 'DecorateurVehicule.class.php';
require_once 'ComposantGraphiqueVehicule.class.php';

class MarqueDecorateur extends DecorateurVehicule
{

    /**
     *
     * @param ComposantGraphiqueVehicule $composant            
     */
    public function __construct(ComposantGraphiqueVehicule $composant)
    {
        parent::__construct($composant);
    }

    protected function afficheLogo()
    {
        \Outils::println('Logo de la marque');
    }

    public function affiche()
    {
        parent::affiche();
        $this->afficheLogo();
    }
}

?>
