<?php
namespace Adapter;

require_once 'Document.class.php';
require_once 'ComposantPdf.class.php';

class DocumentPdf implements Document
{
    /**
     * 
     * @var ComposantPdf
     */
    protected $outilPdf;

    public function __construct()
    {
        $this->outilPdf = new ComposantPdf();
    }

    /**
     *
     * @param string $contenu            
     */
    public function setContenu($contenu)
    {
        $this->outilPdf->pdfFixeContenu($contenu);
    }

    public function dessine()
    {
        $this->outilPdf->pdfPrepareAffichage();
        $this->outilPdf->pdfRafraichit();
        $this->outilPdf->pdfTermineAffichage();
    }

    public function imprime()
    {
        $this->outilPdf->pdfEnvoieImprimante();
    }
}

?>
