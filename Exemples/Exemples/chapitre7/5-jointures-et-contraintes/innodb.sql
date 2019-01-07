-- Voir les moteurs disponibles
SHOW ENGINES;

-- Création des tables
CREATE TABLE pays (
  codepays   CHAR(2)     PRIMARY KEY,
  libelle    VARCHAR(15) UNIQUE NOT NULL
) ENGINE=InnoDB;

CREATE TABLE utilisateurs (
  idUtilisateur INTEGER     PRIMARY KEY,
  prenom        VARCHAR(40) NOT NULL,
  nom           VARCHAR(40) NOT NULL,
  codePays      CHAR(2)         NULL,
  
  INDEX idx_codePays (codePays), -- Ajout d'un INDEX pour accèlérer la jointure
  FOREIGN KEY (codePays) REFERENCES pays(codePays)
      ON DELETE RESTRICT
      ON UPDATE CASCADE  
) ENGINE=InnoDB;

-- Insérer des données dans les tables
INSERT INTO pays (codePays, libelle) VALUES
    ('FR', 'France')
  , ('US', 'United-states')
  , ('EN', 'United kingdom')
  , ('JP', 'Japan');

INSERT INTO utilisateurs (idUtilisateur, prenom, nom, codePays) VALUES
    (1, 'Robert',  'Dupont',  'FR')
  , (2, 'Jeanine', 'Dupond',  NULL)
  , (3, 'Jack',    'O''Neil', 'US')
  , (4, 'Hiro',    'Nagaji',  'JP');


-- Extraire la totalité des données des tables
SELECT * FROM utilisateurs;
SELECT * FROM pays;

-- Jointures implicites
-- -- CROSS JOIN -- sans clause de correspondance
SELECT * FROM utilisateurs, pays; 

-- -- INNER JOIN -- avec clause de correspondance
SELECT * FROM utilisateurs AS c, pays AS p WHERE c.codePays = p.codePays;


-- Jointures explicites
-- -- INNER JOIN -- avec clause de correspondance USING
SELECT * FROM utilisateurs      INNER JOIN pays      USING(codePays);
-- -- INNER JOIN -- avec clause de correspondance ON
SELECT * FROM utilisateurs AS c INNER JOIN pays AS p ON c.codePays = p.codePays;

-- -- LEFT JOIN -- avec clause de correspondance USING
SELECT * FROM utilisateurs      LEFT  JOIN pays      USING(codePays);
-- -- RIGHT JOIN -- avec clause de correspondance USING
SELECT * FROM utilisateurs      RIGHT JOIN pays      USING(codePays);


-- Erreurs d'insertions
INSERT INTO pays (codePays, libelle) VALUES ('FR', 'FRANCE'); -- FR existe déjà
INSERT INTO utilisateurs (idUtilisateur, prenom, nom, codePays) VALUES (5, 'Alfred', 'GHUOJ', 'RU'); -- RU n'existe pas

-- Mise à jour acceptée (ON UPDATE CASCADE)
UPDATE pays SET codePays='RU' WHERE codePays='US';
SELECT * FROM pays;
SELECT * FROM clients;

-- Suppression refusée (ON DELETE RESTRICT)
DELETE FROM pays WHERE codePays='FR';
SELECT * FROM pays;
SELECT * FROM clients;

-- Suppression des tables
DROP TABLE utilisateurs;
DROP TABLE pays;