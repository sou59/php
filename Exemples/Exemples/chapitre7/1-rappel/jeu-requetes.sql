-- Création d'un table de test

CREATE TABLE coucou (
  id INTEGER
);

-- Insérer des données dans la table
INSERT INTO coucou (id) VALUES (1), (2);

-- Modifier des données
UPDATE coucou SET id=100 WHERE id=1;

-- Supprimer des données
DELETE FROM coucou WHERE id=2;

-- Extraire la totalité des données de la TABLE
SELECT * FROM coucou;

-- Insérer plus de données, pour faire des extractions
INSERT INTO coucou (id) VALUES (1), (2), (1), (2), (1), (2), (1), (2), (3), (4), (3), (4), (100);

-- Recherche exacte
SELECT id FROM coucou WHERE id = 100;

-- Tri des résultats
SELECT id FROM coucou ORDER BY id;

-- Regroupement
SELECT id, count(*) FROM coucou GROUP BY id;

-- Création d'alias
SELECT id AS identifiant, count(*) AS nombre_compte FROM coucou GROUP BY id;


-- Suppression de la table
DROP TABLE coucou;