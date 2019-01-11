<?php
namespace Mediator;

require_once '../Outils.class.php';
require_once 'Controle.class.php';

class Bouton extends Controle
{

    /**
     *
     * @param string $nom            
     */
    public function __construct($nom)
    {
        parent::__construct($nom);
    }

    /**
     *
     * @return void
     */
    public function saisie()
    {
        $reponse = \Outils::readln(
                'Désirez-vous activer le bouton « '
                 . "$this->nom » (oui / non) ? : ");
        if ($reponse === 'oui')
        {
            $this->modifie();
        }
    }
}

?>
