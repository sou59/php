<?php

class Vue
{

    protected $templateUrl;
    protected $attributs = array();

    public function __construct($page)
    {
        // [TODO] Implémenter le contructeur
        // $fileName = ...
        if (file_exists($fileName)) {
            $this->templateUrl = $fileName;
        }
    }

    public function afficher()
    {
        // [TODO]
    }
}
