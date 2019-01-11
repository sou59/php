<?php
namespace Adapter;

require_once 'Document.class.php';
require_once '../Outils.class.php';

class DocumentHtml implements Document
{
    /**
     * 
     * @var string
     */
    protected $contenu;

    /**
     *
     * @param string $contenu            
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    public function dessine()
    {
        \Outils::println(
                "Dessine document HTML : $this->contenu");
    }

    public function imprime()
    {
        \Outils::println(
                "Imprime document HTML : $this->contenu");
    }
}

?>
