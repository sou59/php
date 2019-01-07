<?php
    class Db {
        static protected $db = null;
     
        static function connect() {
            if (!isset(self::$db)) {
                try {
                    self::$db = new PDO("mysql:host=localhost;dbname=formation", "formation", "T@rt1Fl3tt3");
                    self::$db->exec("SET NAMES UTF8");
                } catch (Exception $e) {
                    die("Problème de connexion à la base de données");
                }
            }
            return self::$db;
        }
    }
