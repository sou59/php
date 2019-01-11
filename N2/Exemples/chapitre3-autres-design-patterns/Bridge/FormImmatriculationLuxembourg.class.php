<?php
namespace Bridge;

require_once 'FormulaireImmatriculation.class.php';
require_once 'FormulaireImpl.class.php';

class FormImmatriculationLuxembourg extends FormulaireImmatriculation
{
    const NBR_CARACTERES = 5;

    /**
     *
     * @param FormulaireImpl $implantation            
     */
    public function __construct(FormulaireImpl $implantation)
    {
        parent::__construct($implantation);
    }

    protected function controleSaisie($plaque)
    {
        return strlen($plaque) == 
            FormImmatriculationLuxembourg::NBR_CARACTERES;
    }

   protected function getContrainte()
    {
        return FormImmatriculationLuxembourg::NBR_CARACTERES .
            ' car.';
    }
}

?>
