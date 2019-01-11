<?php
namespace Mediator;

require_once 'Controle.class.php';
require_once '../Outils.class.php';

class ZoneSaisie extends Controle
{
    /**
     * 
     * @param string $nom
     */
    public function __construct($nom)
    {
        parent::__construct($nom);
    }

    public function saisie()
    {
        $val = \Outils::readln("Saisie de <$this->nom> : ");
        $this->modifie();
    }
}

?>
