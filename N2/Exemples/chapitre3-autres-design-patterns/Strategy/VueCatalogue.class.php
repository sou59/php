<?php
namespace Strategy;

require_once 'DessinCatalogue.class.php';
require_once 'VueVehicule.class.php';
require_once 'ListeVueVehicule.class.php';

class VueCatalogue
{
    /**
     * 
     * @var ListeVueVehicule
     */
    protected $contenu;
    /**
     * 
     * @var DessinCatalogue
     */
    protected $dessin;

    /**
     * 
     * @param DessinCatalogue $dessin
     */
    public function __construct(DessinCatalogue $dessin)
    {
        $this->contenu = new ListeVueVehicule();
        $this->contenu->append(new VueVehicule('véhicule bon marché'));
        $this->contenu->append(new VueVehicule('véhicule spacieux'));
        $this->contenu->append(new VueVehicule('véhicule rapide'));
        $this->contenu->append(new VueVehicule('véhicule confortable'));
        $this->contenu->append(new VueVehicule('véhicule sportif'));
        
        $this->dessin = $dessin;
    }

    public function dessine()
    {
        $this->dessin->dessine($this->contenu);
    }
}


?>
