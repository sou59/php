<?php

namespace App\Bdd;

interface BddInterface
{

    public function __construct($host, $dbname, $user, $pass);

    public function connect();

    public function close();

    public function fetchAll($sql, $params = array());

    public function fetchRow($sql, $params = array());

    public function fetchOne($sql, $params = array());

    public function delete($table, $where, $params = array());
    
    public function exec($sql);
}
