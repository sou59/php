<?php
spl_autoload_register(function ($className) {

	if (file_exists("classes/$className.class.php")) {
		require ("classes/$className.class.php");
	} else {
		return false; // On laisse le système léver une erreur fatale !
	}

});
spl_autoload_register(function ($className) {
	// Lorsque l'on souhaite créer un objet de type forfait, il faut en fait que le système aille chercher dans la bdd les informations
	$count = 0;
	$forfaitName = preg_replace('`^Forfait`', '', $className, -1, $count);
	
	if ($count == 1) {
		$db = $GLOBALS['BAO']->getDb();
		$sql = "SELECT codeForfait, libelle, dataMax FROM forfaits WHERE libelle = :libelleForfait";
		$stmt = $db->prepare($sql);
		$stmt->execute(array("libelleForfait" => $forfaitName));

		if ($stmt === false || $stmt->errorCode() !== '00000') die("Erreur lors de l'extraction des forfaits");
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		
		// Création d'un classe sur mesure
		$dataMax = is_null($row->dataMax) ? 'null' : $row->dataMax;
		$classDefinition = <<<"CLASS"
		class Forfait{$row->libelle} extends Forfaits {
			function __construct() {
				parent::__construct('{$row->libelle}', {$dataMax});
			}
		}
CLASS;
		eval($classDefinition); // Evaluation de la classe -- Cette méthode est à utiliser avec beaucoup de précaution en fonction de la provenance des données inclus dans l'evaluation
	} else {
		return false;
	}
});