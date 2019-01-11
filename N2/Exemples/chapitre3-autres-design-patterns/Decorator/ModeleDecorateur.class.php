<?php
namespace Decorator;

require_once '../Outils.class.php';
require_once 'DecorateurVehicule.class.php';
require_once 'ComposantGraphiqueVehicule.class.php';

class ModeleDecorateur extends DecorateurVehicule
{

    /**
     *
     * @param ComposantGraphiqueVehicule $composant            
     */
    public function __construct(ComposantGraphiqueVehicule $composant)
    {
        parent::__construct($composant);
    }

    protected function afficheInfosTechniques()
    {
        \Outils::println('Informations techniques du modèle');
    }

    public function affiche()
    {
        parent::affiche();
        $this->afficheInfosTechniques();
    }
}

?>
