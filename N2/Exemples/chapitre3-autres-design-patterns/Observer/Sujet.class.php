<?php
namespace Observer;

require_once 'Observateur.class.php';

abstract class Sujet
{
    /**
     * 
     * @var "Liste d'Observateur"
     */
    protected $observateurs = array();
    
    /**
     *
     * @param Observateur $observateur            
     */
    public function ajoute(Observateur $observateur)
    {
        $this->observateurs[] = $observateur;
    }

    /**
     *
     * @param Observateur $observateur            
     */
    public function retire(Observateur $observateur)
    {
        $key = array_search($observateur, $this->observateurs);
        if ($key !== FALSE)
        {
            unset($this->observateurs[$key]);
        }
    }

    public function notifie()
    {
        foreach ($this->observateurs as $observateur)
        {
            $observateur->actualise();
        }
    }
}

?>
