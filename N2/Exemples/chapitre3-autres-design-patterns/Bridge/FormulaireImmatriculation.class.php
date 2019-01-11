<?php
namespace Bridge;

require_once 'FormulaireImpl.class.php';

abstract class FormulaireImmatriculation
{
    /**
     * 
     * @var string
     */
    protected $contenu;
    /**
     * 
     * @var FormulaireImpl
     */
    protected $implantation;

    /**
     *
     * @param FormulaireImpl $implantation            
     */
    public function __construct(FormulaireImpl $implantation)
    {
        $this->implantation = $implantation;
    }

    public function affiche()
    {
        $this->implantation->dessineTexte(
                'numéro de la plaque existante (' .
                 $this->getContrainte() . ') : ');
    }

    public function genereDocument()
    {
        $this->implantation->dessineTexte(
                'Demande d\'immatriculation');
        $this->implantation->dessineTexte(
                "numéro de plaque : $this->contenu");
    }

    
    /**
     * 
     * @return boolean
     */
    public function gereSaisie()
    {
        $this->contenu = $this->implantation->gereZoneSaisie();
        return $this->controleSaisie($this->contenu);
    }

    /**
     *
     * @param string $plaque      
     * @return boolean      
     */
    protected abstract function controleSaisie($plaque);

    /**
     *
     * @return string
     */
    protected abstract function getContrainte();
}

?>
