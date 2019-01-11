<?php
interface ForfaitsInterface {
	public function getForfaitName();
	public function getDataUsed();
}

abstract class Forfaits implements ForfaitsInterface {
	private   $_nom       = null;
	private   $_data_max  = null;
	private   $_data_used = null;

	function __construct($nom, $data_max = null) {
		$this->_nom      = $nom;
		$this->_data_max = $data_max;
		
		if (!is_null($this->_data_max)) {
			$this->_data_used = 0;
		}
	}
	
	function utiliserData($qty) {
		if ($this->_data_used + $qty <= $this->_data_max) {
			$this->_data_used+=$qty;
			return true;
		} else {
			return false;
		}
	}
	
	function getForfaitName() {
		return ucfirst($this->_nom);
	}
	function getDataUsed() {
		if (is_null($this->_data_max)) return "Pas de data";
		else return ( ((int) ($this->_data_used /1024/1024*100)) /100 ).' / '.($this->_data_max/1024/1024);
	}
	
	function getDataUsedOctet() {
		return $this->_data_used;
	}

}
