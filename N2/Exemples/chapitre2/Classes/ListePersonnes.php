<?php
class ListePersonnes implements Countable, Iterator {
    protected $tabPersonnes = array();
    protected $position     = 0;
    
    
    public function ajouterPersonne(Personne $personne) {
        $this->tabPersonnes[] = $personne;
    }

    public function count($mode = 'COUNT_NORMAL') {
        if ($mode) {
            return count($this->tabPersonnes);
        } else {
            trigger_error("Mode inconnu", E_USER_ERROR);
        }
    }

    public function current() {
        if ($this->valid()) {
            return $this->tabPersonnes[$this->position];
        } else {
            return null;
        }
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        if (is_null($this->position) && count($this->tabPersonnes > 0)) {
            $this->position = 0;
        } else if (!is_null($this->position)) {
            $this->position++;
        }
        return $this;
    }

    public function rewind() {
        $this->position= 0;
        return $this;
    }

    public function valid() {
        if ($this->position !== null && $this->position >= 0 && $this->position < count($this->tabPersonnes)) {
            return true;
        } else {
            return false;
        }
    }
}