<?php
spl_autoload_register(function ($className) {

	if (file_exists("classes/$className.class.php")) {
		require ("classes/$className.class.php");
	} else {
		return false; // On laisse le système léver une erreur fatale !
	}

});
spl_autoload_register(function ($className) {

	if (file_exists("classes/Forfaits/$className.class.php")) {
		require ("classes/Forfaits/$className.class.php");
	} else {
		return false; // On laisse le système léver une erreur fatale !
	}

});


// Note, il serais plus logique d'utiliser une seule fonction, qui utilise un « esle if »,
// mais cela montre qu'il est tout à fair possible d'appeler « spl_autoload_register » plusieurs fois,
// dans certains cas, il est impossible de faire autrement.