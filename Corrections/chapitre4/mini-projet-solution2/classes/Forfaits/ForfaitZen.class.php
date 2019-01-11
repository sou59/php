<?php
class ForfaitZen extends Forfait {
	function __construct(Telephone $telephone) {
		parent::__construct('Zen', $telephone, null);
	}
}
