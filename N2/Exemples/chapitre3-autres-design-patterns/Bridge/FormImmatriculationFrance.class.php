<?php
namespace Bridge;

require_once 'FormulaireImmatriculation.class.php';

class FormImmatriculationFrance extends FormulaireImmatriculation
{
    const NBR_CARACTERES = 7;

    /**
     *
     * @param FormulaireImpl $implantation            
     */
    public function __construct($implantation)
    {
        parent::__construct($implantation);
    }

    protected function controleSaisie($plaque)
    {
        return strlen($plaque) == 
            FormImmatriculationFrance::NBR_CARACTERES;
    }

    protected function getContrainte()
    {
        return FormImmatriculationFrance::NBR_CARACTERES . 
            ' car.';
    }
}

?>
