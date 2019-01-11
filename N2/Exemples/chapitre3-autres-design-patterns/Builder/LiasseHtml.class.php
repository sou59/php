<?php
namespace Builder;

require_once '../Outils.class.php';
require_once 'Liasse.class.php';

class LiasseHtml extends Liasse
{

    /**
     *
     * @param string $document            
     */
    public function ajouteDocument($document)
    {
        if (\Outils::str_start_with($document, '<HTML>'))
        {
            $this->contenu[] = $document;
        }
    }

    public function imprime()
    {
        \Outils::println('Liasse HTML');
        foreach ($this->contenu as $s)
        {
            \Outils::println($s);
        }
    }
}

?>
