<?php
namespace Observer;

require_once '../Outils.class.php';
require_once 'Observateur.class.php';

class VueVehicule implements Observateur
{
    /**
     * 
     * @var Vehicule
     */
    protected $vehicule;
    /**
     * 
     * @var string
     */
    protected $texte;
    /**
     * 
     * @var string
     */
    protected $nomVue;
    
    /**
     *
     * @param string $nomVue            
     * @param Vehicule $vehicule            
     */
    public function __construct($nomVue, Vehicule $vehicule)
    {
        $this->nomVue = $nomVue;
        $this->vehicule = $vehicule;
        $vehicule->ajoute($this);
        $this->metAJourTexte();
    }

    protected function metAJourTexte()
    {
        $this->texte = $this->nomVue . ' : "' .
                 $this->vehicule->getDescription() . '", Prix : ' .
                 number_format($this->vehicule->getPrix(), 2, 
                        ',', ' ');
    }

    public function actualise()
    {
        $this->metAJourTexte();
        $this->redessine();
    }

    public function redessine()
    {
        \Outils::println($this->texte);
    }
}

?>
