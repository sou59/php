<?php
class ForfaitPlay extends Forfait {
	function __construct($telephone) {
		parent::__construct('Play', $telephone, 100*1024*1024);
	}
}
