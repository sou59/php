<?php
namespace Mediator;

require_once 'Controle.class.php';
require_once '../Outils.class.php';

class PopupMenu extends Controle
{
    /**
     * @var "Liste de string"
     */
    protected $options = array();

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
        \Outils::println("Saisie de : $this->nom");
        \Outils::println(
                '    Valeur actuelle : ' . $this->getValeur());
        \Outils::println('    Valeurs possibles :');
        for ($index = 0; $index < count($this->options); $index ++)
        {
            \Outils::println(
                    "    - $index) " . $this->options[$index]);
        }
        $choix = \Outils::readln('Que choisissez-vous ? : ');
        if (is_numeric($choix) && ($choix >= 0) && ($choix < count($this->options)))
        {
            $change = ! ($this->getValeur() ===
                     $this->options[$choix]);
            if ($change)
            {
                $this->setValeur($this->options[$choix]);
                $this->modifie();
            }
        } else {
            echo $this->getValeur().PHP_EOL;
        }
    }

    /**
     *
     * @param string $option            
     */
    public function ajouteOption($option)
    {
        $this->options[] = $option;
    }
}

?>
