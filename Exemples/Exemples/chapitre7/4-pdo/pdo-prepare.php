<?php
    
    include '../config.php';
    
    // Connexion à la bdd
    try {
        $db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_BASE."", MYSQL_USER, MYSQL_PASS);
        $db->exec("SET NAMES UTF8");
    } catch (Exception $e) {
        die("Problème de connexion à la base de données");
    }
  
    // Explication de ce script
    echo <<<'EXPLICATION'
        <p>Cette page ne reçoit aucun paramètre d'aucune sorte.</p>
        <p>Les valeurs passés à la base de données sont forcés dans le script.</p>
EXPLICATION;
    
    
    
    
    
    
    
    // On pépare la requête
    $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE prenom LIKE :prenom OR nom LIKE :nom");
    

    // ******************
    // Première Execution
    // ******************
    
    $prenom = "Al%";
    $nom    = "DUP%";
    $stmt->execute(array('prenom' => $prenom, 'nom' => $nom)); // Éxecution 1 avec paramètres
    
    echo "---------[prenom='$prenom', nom='$nom']";
    var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
    
    // Fermer le curseur avant de rappeler execute()
    $stmt->closeCursor();
  




    // *****************
    // Seconde Execution
    // *****************
    // On utilise la préparation précédente
    $prenom = "%k";
    $nom    = "D_P%";
    $stmt->execute(array('prenom' => $prenom, 'nom' => $nom)); // Éxecution 2 avec d'autres paramètres
    
    echo "---------[prenom='$prenom', nom='$nom']";
    // Parcourir avec foreach
    foreach ($stmt as $row) {
        var_dump($row);
    }
    
    // Fermer le curseur avant de rappeler execute()
    $stmt->closeCursor();    
    
    
    
    // Déconnexion explicites de la bdd
    unset($db);
