<?php
namespace App\Bdd;

class BddFactory
{
    public static function create($type, array $options = null)
    {
        if ($type === "mysql") {
            $db = new BddMysql($options['host'], $options['dbname'], $options['user'], $options['pass']);
            $db->connect();
            
            return $db;
        } elseif ($type === "memory") {
            $db = new BddMemory();
            $db->connect();
            
            return $db;
        }
        
        trigger_error("BddFactory::create() : Le type de base de donnée [$type] n'est pas reconnu", E_USER_ERROR);
    }
}
