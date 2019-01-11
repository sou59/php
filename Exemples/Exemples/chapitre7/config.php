<?php
  /*
    Copier/Coller cette partie dans PhpMyAdmin, en tant qu'utilisateur « root »
    -- --------
    
    CREATE DATABASE `formation` DEFAULT CHARACTER SET = 'UTF8';
    USE `formation`;
    CREATE USER 'formation'@'%' IDENTIFIED BY 'T@rt1Fl3tt3';
    GRANT ALL PRIVILEGES ON `formation`.* TO 'formation'@'%' WITH GRANT OPTION;
    FLUSH PRIVILEGES;
  */

  define("MYSQL_HOST", "localhost");   // Nom de l'hôte
  define("MYSQL_BASE", "formation");   // Nom de la base de données
  define("MYSQL_USER", "root");   // Nom d'utilisateur SQL
  define("MYSQL_PASS", ""); // Mot de passe