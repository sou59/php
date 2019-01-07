<?php

    include '../config.php';
    
    // Connexion à la bdd
    try {
        $db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_BASE."", MYSQL_USER, MYSQL_PASS);
        $db->exec("SET NAMES UTF8");
    } catch (Exception $e) {
        die("Problème de connexion à la base de données");
    }
  
    // Ajouter une colonne points
    //$stmt = $db->exec("ALTER TABLE `utilisateurs` ADD `points` INT NOT NULL DEFAULT '500'");
    // Attention ALTER, avec MYSQL, va commiter toutes transaction en cours, et ré-active l'auto-commit (http://fr2.php.net/manual/fr/pdo.begintransaction.php)
  
    
    $stmt = $db->query('SELECT idClient, points FROM clients WHERE idClient IN (1, 2)');
    echo '<pre>';
    var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
    echo '</pre>';
    
    
    $max     = 1000;
    $min     = 0;
    $echange = 10;
    
    $sql[] = "UPDATE utilisateurs SET points = points + $echange WHERE idClient = 1";
    $sql[] = "UPDATE utilisateurs SET points = points - $echange WHERE idClient = 2";
  
  
    // Débuter la transaction
    $db->beginTransaction();
    
    // Executer les requêtes
    foreach($sql as $requete) {
        $db->exec($requete);
        if ($db->errorCode() !== '00000') {
            $err[] = implode(', ', $db->errorInfo());
        }
    }
  
    // Vérifier les requetes pendant la transactions
    $stmt = $db->query('SELECT idUtilisateur, points FROM clients WHERE idUtilisateur IN (1, 2)');
    echo '<pre>';
    var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
    echo '</pre>';
  
    
    // Tester les limites
    $stmt = $db->prepare("SELECT count(*) FROM utilisateurs WHERE (idUtilisateur = 1 AND points > ?) OR (idUtilisateur = 2 AND points < ?)");
    $stmt->execute(array($max, $min));
    $nb = $stmt->fetchColumn(0); // Récupérer la première cellule
    var_dump($nb);
    if ($nb == 1) {
        $db->rollBack();
    } else {
        $db->commit();
    }
  
    
    $stmt = $db->query('SELECT idUtilisateur, points FROM utilisateurs WHERE idUtilisateur IN (1, 2)');
    echo '<pre>';
    var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
    echo '</pre>';
    
    
    // Déconnexion explicites de la bdd
    unset($db);

  
?>
<?php if (isset($err)) { ?>
    <ul><li><?=implode('</li><li>', $err)?></li></ul>
<?php } ?>