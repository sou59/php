-- ---------------------------------------------------------- --
-- Décommentez ces lignes pour créer l'utilisateur et la base --
-- ---------------------------------------------------------- --
-- 
 CREATE DATABASE `formation-php-orange` DEFAULT CHARACTER SET = 'UTF8';
 USE `formation-php-orange`;
-- DROP USER 'formation-orange'@'%';
-- DROP USER 'formation-orange'@'localhost';
 CREATE USER 'formation-orange'@'%'         IDENTIFIED BY 'JLayzqz7whntEjJd';
 CREATE USER 'formation-orange'@'localhost' IDENTIFIED BY 'JLayzqz7whntEjJd';
 GRANT ALL PRIVILEGES ON `formation-php-orange`.* TO 'formation-orange'@'%'         WITH GRANT OPTION;
 GRANT ALL PRIVILEGES ON `formation-php-orange`.* TO 'formation-orange'@'localhost' WITH GRANT OPTION;
-- 

DROP TABLE IF EXISTS clients;
DROP TABLE IF EXISTS forfaits;

-- Création des tables
CREATE TABLE forfaits (
  codeForfait INTEGER     PRIMARY KEY AUTO_INCREMENT,
  libelle     VARCHAR(15) UNIQUE NOT NULL,
  dataMax     INTEGER     NULL
) ENGINE=InnoDB;

CREATE TABLE clients (
  idClient    INTEGER     PRIMARY KEY AUTO_INCREMENT,
  civilite    VARCHAR(5)  NOT NULL,
  prenom      VARCHAR(40) NOT NULL,
  nom         VARCHAR(40) NOT NULL,
  codeForfait INTEGER         NULL,
  telephone   VARCHAR(15)     NULL,
  dataUsed    INTEGER         NULL,
  
  INDEX idx_codeForfait (codeForfait), -- Ajout d'un INDEX pour accèlérer la jointure
  FOREIGN KEY (codeForfait) REFERENCES forfaits(codeForfait)
      ON DELETE RESTRICT
      ON UPDATE CASCADE  
) ENGINE=InnoDB;

BEGIN; -- Débuter transaction SQL

-- Insérer des données dans les tables
INSERT INTO forfaits (codeForfait, libelle, dataMax) VALUES
    (1, 'Zen',  null)
  , (2, 'Play', 100*1024*1024)
  , (3, 'Jet',  500*1024*1024);

INSERT INTO clients (idClient, civilite, prenom, nom, codeForfait, telephone, dataUsed) VALUES
    (1, 'M.',   'Robert',  'Dupont',  1,    '0102030405', null)
  , (2, 'Mme',  'Jeanine', 'Dupond',  null, null,         null)
  , (3, 'M.',   'Jack',    'O''Neil', 2,    '0902030466', 3678090)
  , (4, 'Mlle', 'Hiro',    'Nagaji',  3,    '0902030444', 457890098);
  
COMMIT; -- Terminer transaction SQL