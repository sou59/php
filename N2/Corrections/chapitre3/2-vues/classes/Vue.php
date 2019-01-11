<?php

class Vue
{

    protected $templateUrl;
    protected $layoutUrl;
    protected $attributs = array();
    protected $menuTopUrl;

    public function __construct($page)
    {
        $fileName = APP_ROOT . "/templates/$page.phtml";
        if (file_exists($fileName)) {
            $this->templateUrl = $fileName;
        }
    }

    public function __get($attrName)
    {
        if (isset($this->attributs[$attrName])) {
            return $this->attributs[$attrName];
        } else {
            return null;
        }
    }

    public function __set($attrName, $value)
    {
        if (is_array($value) && isset($this->attributs[$attrName]) && is_array($this->attributs[$attrName])) {
            // Cas particulier des tableaux, automatiquement en mode Append (Utiliser unset pour ré-initialiser)
            $this->attributs[$attrName] = array_merge($this->attributs[$attrName], $value);
        } else {
            $this->attributs[$attrName] = $value;
        }
    }

    public function __isset($attrName)
    {
        return isset($this->attributs[$attrName]);
    }

    public function __unset($attrName)
    {
        unset($this->attributs[$attrName]);
    }

    public function setLayout($structure)
    {
        $this->layoutUrl = APP_ROOT . "/templates/layouts/$structure.phtml";
    }

    public function setMenuTop($menu)
    {
        $this->menuTopUrl = APP_ROOT . "/templates/menus/$menu.phtml";
    }

    public function getContent()
    {
        if (!is_null($this->templateUrl)) {
            include $this->templateUrl;
        }
    }

    public function getMenuTop()
    {
        if (!is_null($this->menuTopUrl)) {
            require $this->menuTopUrl;
        }
    }

    public function afficher()
    {
        if (!is_null($this->layoutUrl)) {
            include $this->layoutUrl;
        } else {
            $this->getContent();
        }
    }
}
