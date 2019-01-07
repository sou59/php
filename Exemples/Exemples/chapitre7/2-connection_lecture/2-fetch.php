<?php
    include '../config.php';
    
    // Connexion à la base de données (avec PDO)
    $pdo = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_BASE."", MYSQL_USER, MYSQL_PASS);
    // Nous prévenons le serveur que les caractères envoyé sont en UTF-8
    $pdo->exec("SET NAMES UTF8");

    // /!\ Pour simplifier la lecture du code ci-dessous, aucune gestion des erreurs n'est faite.
    
    
    // Supprimer la table, si existante (Permet de relancer ce code plusieurs fois, sans erreur)
    $pdo->exec('DROP TABLE IF EXISTS coucou');
    
    // Créer une table 
    $pdo->exec('CREATE TABLE coucou (id INTEGER, libelle VARCHAR(30))');
    
    // Insérer des données
    $pdo->exec("INSERT INTO coucou (id, libelle) VALUES (1, 'lib 1')");
    $pdo->exec("INSERT INTO coucou (id, libelle) VALUES (2, 'lib 2')");
    $pdo->exec("INSERT INTO coucou (id, libelle) VALUES (3, 'lib 3')");
    
    
    // Lire les données
    $rows = array(); // Création d'un tableau vide
    $stmt = $pdo->query("SELECT libelle FROM coucou"); // Éxecution de la requête
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // $row = une ligne de résultat ; si false, on sort de la boucle
        $rows[] = $row; // On stock la ligne de résultat ($row), dans le tableau ($rows)
    }
    
    var_dump($rows);