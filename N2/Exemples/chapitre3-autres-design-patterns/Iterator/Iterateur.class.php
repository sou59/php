<?php
namespace Iterator;

class Iterateur
{
    /**
     *
     * @var string
     */
    protected $motCleRequete;
    /**
     *
     * @var int
     */
    protected $index;
    /**
     *
     * @var "Liste d'Element"
     */
    protected $contenu;

    /**
     *
     * @param string $motCleRequete            
     * @param "Liste d'Element" $contenu            
     * @return void
     */
    public function setMotCleRequete($motCleRequete, $contenu)
    {
        $this->motCleRequete = $motCleRequete;
        $this->contenu = $contenu;
    }

    /**
     *
     * @return void
     */
    public function debut()
    {
        $this->index = -1;
        $this->suivant();
    }

    /**
     *
     * @return void
     */
    public function suivant()
    {
        $taille = count($this->contenu);
        $this->index ++;
        while (($this->index < $taille) &&
                 (! $this->contenu[$this->index]->motCleValide(
                        $this->motCleRequete)))
        {
            $this->index ++;
        }
    }

    /**
     *
     * @return Element null
     */
    public function item()
    {
        if ($this->index < count($this->contenu))
        {
            return $this->contenu[$this->index];
        }
        else
        {
            return null;
        }
    }
}

?>
