ALTER TABLE `clients` ADD `points` INT NOT NULL DEFAULT '500' ;

BEGIN;
  UPDATE clients SET points=points+10 WHERE idClient=1 AND points<990;
  UPDATE clients SET points=points-10 WHERE idClient=2 AND points>10;
COMMIT;
