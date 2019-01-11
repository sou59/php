<?php
class ForfaitJet extends Forfait {
	function __construct(Telephone $telephone) {
		parent::__construct('Jet', $telephone, 500*1024*1024);
	}
}
