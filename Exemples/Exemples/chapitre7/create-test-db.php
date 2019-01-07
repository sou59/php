<?php
  /**
   * Ce script à pour but de créer rapidement la base de donnée utilisé pour ce chapitre
   */
  include 'config.php';

  // Connexion à la base de donnée (voir config.php)
  $db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_BASE."", MYSQL_USER, MYSQL_PASS);
  $db->exec("SET NAMES UTF8"); // Prévenir la base de donnée que nous allons lui envoyer des caractères UTF-8

  // Préparer les requêtes de creátion de tables et d'insertion de données
  $sql[] = <<<"SQL"
        DROP TABLE IF EXISTS utilisateurs
SQL;
  $sql[] = <<<"SQL"
        DROP TABLE IF EXISTS pays
SQL;
  $sql[] = <<<"SQL"
        CREATE TABLE pays (
            codepays   CHAR(2)     PRIMARY KEY,
            libelle    VARCHAR(15) UNIQUE NOT NULL
        ) ENGINE=InnoDB
SQL;
  $sql[] = <<<"SQL"
        CREATE TABLE utilisateurs (
            idUtilisateur  INTEGER     PRIMARY KEY,
            prenom         VARCHAR(40) NOT NULL,
            nom            VARCHAR(40) NOT NULL,
            codePays       CHAR(2)         NULL,
            
            INDEX idx_codePays (codePays), -- Ajout d`un INDEX pour accèlérer la jointure
            FOREIGN KEY (codePays) REFERENCES pays(codePays)
                ON DELETE RESTRICT
                ON UPDATE CASCADE  
        ) ENGINE=InnoDB
SQL;
  $sql[] = <<<"SQL"
        INSERT INTO pays (codePays, libelle) VALUES
          ('FR', 'France')
        , ('US', 'United-states')
        , ('EN', 'United kingdom')
        , ('JP', 'Japan')
SQL;
  $sql[] = <<<"SQL"
        INSERT INTO utilisateurs (idUtilisateur, prenom, nom, codePays) VALUES
          (1, 'Robert',  'Dupont',  'FR')
        , (2, 'Jeanine', 'Dupond',  NULL)
        , (3, 'Jack',    'O''Neil', 'US')
        , (4, 'Hiro',    'Nagaji',  'JP')
SQL;

  // Effectuer les 4 requêtes préalablement créées
  foreach($sql as $requete) {
    $db->exec($requete); // Une gestion des erreurs devrait être faite, voir l'exemple (4) pour plus de détail
    if ($db->errorCode()[0] != '00000') {
        var_dump($db->errorInfo());
    }
  }
  
  echo "Tables créées (Si pas d'erreur au dessus)";