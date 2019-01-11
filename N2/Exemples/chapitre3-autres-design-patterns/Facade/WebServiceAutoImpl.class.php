<?php
namespace Facade;

require_once 'WebServiceAuto.class.php';
require_once 'ComposantCatalogue.class.php';
require_once 'ComposantGestionDocument.class.php';

class WebServiceAutoImpl implements WebServiceAuto
{
    /**
     * 
     * @var Catalogue
     */
    protected $catalogue;
    /**
     * 
     * @var GestionDocument
     */
    protected $gestionDocument;
    
    public function __construct()
    {
        $this->catalogue = new ComposantCatalogue();
        $this->gestionDocument = new ComposantGestionDocument();
    }

    public function document($index)
    {
        return $this->gestionDocument->document($index);
    }

    public function chercheVehicules($prixMoyen, $ecartMax)
    {
        return $this->catalogue->retrouveVehicules(
                $prixMoyen - $ecartMax, $prixMoyen + $ecartMax);
    }
}

?>
