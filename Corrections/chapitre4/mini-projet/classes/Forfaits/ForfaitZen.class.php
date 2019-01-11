<?php
class ForfaitZen extends Forfait {
	function __construct($telephone) {
		parent::__construct('Zen', $telephone, null);
	}
}
