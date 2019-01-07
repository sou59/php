<?php
    include '../config.php'; // Inclure les informations de connexion
  
    // Connexion à la bdd
    try {
        $db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_BASE."", MYSQL_USER, MYSQL_PASS);
        $db->exec("SET NAMES UTF8");
    } catch (Exception $e) {
        die("Problème de connexion à la base de données");
    }
    
    // Si prenom et nom, saisie en GET
    if (isset($_GET['prenom']) && isset($_GET['nom'])) {
        
        $prenom = $_GET['prenom'];
        $nom    = $_GET['nom'];
        
        // Création de la requête SQL
        $sql = "
          SELECT count(*) AS compteur
            FROM  utilisateurs
            WHERE prenom = '$prenom'
              AND    nom = '$nom'
        ";
        
        // Affichage de la requête pour debug
        var_dump($sql); // Ce var_dump() permet de bien voir comment la requête est interprétée
        
        // Execution de la requête
        $stmt = $db->query($sql);
        if ($stmt === false) { // Erreur dans la requête
            
            // ATTENTION, ne jamais laisser un message tel que celui-ci en production, car la requête SQL permet d'avoir des informations sur la structure des tables, et parfois laisse apparaitres les mots de passes
            $message[] = 'Erreur dans la requête SQL ['.implode(',', $db->errorInfo()).']';
            $message[] = '<a href="../create-test-db.php">Cliquer ici, si la base n\'est pas encore installé</a>';
        } else {
            // Récupérer l'unique colonne
            $row   = $stmt->fetch(PDO::FETCH_OBJ); // Récupérer le 1er enregistrement sous la forme d'un objet
            $count = $row->compteur;
            
            $message[] = "La valeur renvoyée par la requête est : $count";
        }
    }
    
        
    // Déconnexion explicites de la bdd
    unset($db);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Injection SQL</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        
        <?php if (isset($message)): ?>
            <ul>
                <li><?=implode('</li><li>', $message)?></li>
            </ul>
        <?php else: ?>
            Il faut donner des valeurs GET pour les variables 'prenom' et 'nom'
            <br />(ex: /?prenom=hiro&nom=nagaji)
            <br /><a href='?prenom=hiro&amp;nom=nagaji'>?prenom=hiro&amp;nom=nagaji</a>
            <br /><a href='?prenom=jack&amp;nom=o&apos;neil'>?prenom=jack&amp;nom=o'neil</a>
            <br /><br /><br />
            Ou utiliser ce formulaire ci-dessous, qui va le faire directement
        <?php endif; ?>
        <form action="?" method="get">
            <input type="text" name="prenom" placeholder="Prénom" value="<?=isset($prenom) ? $prenom : ''?>" />
            <input type="text" name="nom"    placeholder="Nom"    value="<?=isset($nom)    ? $nom    : ''?>" />
            <button type="submit">Soumettre</submit>
        </form>
        
    </body>
</html>