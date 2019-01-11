<?php
namespace Adapter;

require_once '../Outils.class.php';

class ComposantPdf
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
    public function pdfFixeContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    public function pdfPrepareAffichage()
    {
        \Outils::println('Affichage PDF : Début');
    }

    public function pdfRafraichit()
    {
        \Outils::println(
                "Affichage contenu PDF : $this->contenu");
    }

    public function pdfTermineAffichage()
    {
        \Outils::println('Affichage PDF : Fin');
    }

    public function pdfEnvoieImprimante()
    {
        \Outils::println("Impression PDF : $this->contenu");
    }
}

?>
