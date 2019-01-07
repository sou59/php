<?php
	$prenom = "Olivier";
	$nom    = "Lonzi";
	$ville  = "Paris";
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?=$titre?></title>
		<meta charset="UTF-8" />
	</head>
	<body>

<p>Je m'appelle <?php echo $prenom; ?> <?php echo $nom; ?> et travaille à <?php echo $ville; ?></p>

<p>Je m'appelle <?=$prenom?> <?=$nom?> et travaille à <?=$ville?></p>

<p><?php echo 'Je m\'appelle ', $prenom, ' ', $nom, ' et travaille à ', $ville; ?></p>

	</body>
</html>
