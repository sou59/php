<?php
    include '../config.php';
    
    // Connexion à la base de donées (avec les fonctions MYSQLI)
    $resource = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_BASE);
    
    // Connexion à la base de donées (avec l'objet MYSQLI)
    $mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_BASE);
    
    // Connexion à la base de données (avec PDO)
    $pdo = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_BASE."", MYSQL_USER, MYSQL_PASS);
    
    
    
    
    // Dans les 3 connexions effectué, nous allons prévenir le serveur que les caractères envoyé sont en UTF-8
    mysqli_query($resource, "SET NAMES UTF8");
    $mysqli->query("SET NAMES UTF8");
    $pdo->exec("SET NAMES UTF8");

    // /!\ Nous avons maintenant 3 sessions connecté à la base de données (C'est une très mauvaise idée en production)
    //     L'idée est ici de présenter les 3 solutions actuelles, et pourquoi la recommandation est en faveur de PDO
    
    
    // /!\ Pour simplifier la lecture du code ci-dessous, aucune gestion des erreurs n'est faite.
    
    
    // Supprimer la table, si existante (Permet de relancer ce code plusieurs fois, sans erreur)
    mysqli_query($resource, 'DROP TABLE IF EXISTS coucou');
    
    // Créer une table 
    $mysqli->query('CREATE TABLE coucou (id INTEGER, libelle VARCHAR(30))');
    
    // Insérer des données
    mysqli_query($resource, "INSERT INTO coucou (id, libelle) VALUES (1, 'lib 1')");
    $mysqli        -> query("INSERT INTO coucou (id, libelle) VALUES (2, 'lib 2')");
    $pdo           ->  exec("INSERT INTO coucou (id, libelle) VALUES (3, 'lib 3')");
    
    
    
    
    // Lire les données (Objet MYSQLi)
    $result = $mysqli->query("SELECT libelle FROM coucou WHERE id <= 2"); // 2 lignes de résultat
    $rows[1] = $result->fetch_assoc(); // Chaque appel à la méthode fetch_assoc(), ...
    $rows[2] = $result->fetch_assoc(); // ... permet de récupérer une ligne différente.
    $rows[3] = $result->fetch_assoc(); // NULL une fois que toutes les lignes ont été lues.
    
    var_dump($rows);

    // Lire les données (Objet PDO)
    $stmt = $pdo->query("SELECT libelle FROM coucou WHERE id = 3"); // 1 ligne de résultat
    $rows[1] = $stmt->fetch(); // Chaque appel à la méthode fetch(), ...
    $rows[2] = $stmt->fetch(); // ... permet de récupérer une ligne différente.
    $rows[3] = $stmt->fetch(); // FALSE une fois que toutes les lignes ont été lues.
    
    var_dump($rows);
