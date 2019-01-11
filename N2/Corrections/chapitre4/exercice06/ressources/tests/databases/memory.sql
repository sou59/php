-- Activer les clés étrangéres
PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS clients;
DROP TABLE IF EXISTS forfaits;

BEGIN; -- Débuter transaction SQL

-- Création des tables
CREATE TABLE forfaits (
  codeForfait INTEGER     PRIMARY KEY AUTOINCREMENT,
  libelle     VARCHAR(15) UNIQUE NOT NULL,
  dataMax     INTEGER     NULL
);

CREATE TABLE clients (
  idClient    INTEGER     PRIMARY KEY AUTOINCREMENT,
  civilite    VARCHAR(5)  NOT NULL,
  prenom      VARCHAR(40) NOT NULL,
  nom         VARCHAR(40) NOT NULL,
  codeForfait INTEGER         NULL,
  telephone   VARCHAR(15)     NULL,
  dataUsed    INTEGER         NULL,

  FOREIGN KEY (codeForfait) REFERENCES forfaits(codeForfait)
      ON DELETE RESTRICT
      ON UPDATE CASCADE  
);

-- Insérer des données dans les tables
INSERT INTO forfaits (codeForfait, libelle, dataMax) VALUES (1, 'Zen',  null);
INSERT INTO forfaits (codeForfait, libelle, dataMax) VALUES (2, 'Play', 100*1024*1024);
INSERT INTO forfaits (codeForfait, libelle, dataMax) VALUES (3, 'Jet',  500*1024*1024);

INSERT INTO clients (idClient, civilite, prenom, nom, codeForfait, telephone, dataUsed) VALUES
    (1, 'M.',   'Robert',  'Dupont',  1,    '0102030405', null);
INSERT INTO clients (idClient, civilite, prenom, nom, codeForfait, telephone, dataUsed) VALUES
    (2, 'Mme',  'Jeanine', 'Dupond',  null, null,         null);
INSERT INTO clients (idClient, civilite, prenom, nom, codeForfait, telephone, dataUsed) VALUES
    (3, 'M.',   'Jack',    'O''Neil', 2,    '0902030466', 3678090);
INSERT INTO clients (idClient, civilite, prenom, nom, codeForfait, telephone, dataUsed) VALUES
    (4, 'Mlle', 'Hiro',    'Nagaji',  3,    '0902030444', 457890098);
  
COMMIT; -- Terminer transaction SQL