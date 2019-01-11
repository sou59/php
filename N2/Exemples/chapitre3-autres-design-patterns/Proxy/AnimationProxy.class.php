<?php
namespace Proxy;

require_once 'Animation.class.php';
require_once 'Film.class.php';
require_once '../Outils.class.php';

class AnimationProxy implements Animation
{
    /**
     * 
     * @var Film
     */
    protected $film = null;
    /**
     * 
     * @var string
     */
    protected $photo = 'affichage de la photo';

    public function clic()
    {
        if (!isset($this->film))
        {
            $this->film = new Film();
            $this->film->charge();
        }
        $this->film->joue();
    }

    public function dessine()
    {
        if (isset($this->film)) 
        {
            $this->film->dessine();
        }
        else
        {
            $this->dessinePhoto($this->photo);
        }
    }

    /**
     *
     * @param string $photo
     */
    public function dessinePhoto($photo)
    {
        \Outils::println($this->photo);
    }
}


?>
