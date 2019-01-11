<?php

namespace App\Bdd;

class BddMemory implements BddInterface
{
    protected $instance;

    public function __construct($host = null, $dbname = null, $user = null, $pass = null)
    {
    }

    public function __destruct()
    {
    }
    
    protected function addFunctions()
    {
        // Creation d'une fonction SQL utilisé dans nos codes, mais inexistante dans SQLite
        $this->instance->sqliteCreateFunction("LCASE", function ($param) { return strtolower($param); });
    }

    public function connect()
    {
        if (!isset($this->instance)) {
            try {
                $this->instance = new \PDO("sqlite::memory:");
                $this->addFunctions();
            } catch (Exception $e) {
                trigger_error("Erreur lors de la création d'une base de données Memory");
            }
        }
        return $this->instance;
    }

    public function close()
    {
        unset($this->instance);
    }

    public function fetchAll($sql, $params = array())
    {

        $stmt = $this->instance->prepare($sql);
        $stmt->execute($params);
        if ($stmt === false || $stmt->errorCode() !== '00000') {
            trigger_error("Erreur lors de l'extraction des données");
            return false;
        }
        $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
        $stmt->closeCursor();
        return $rows;
    }

    public function fetchRow($sql, $params = array())
    {

        $stmt = $this->instance->prepare($sql);
        if ($stmt === false || (!is_null($stmt->errorCode()) && $stmt->errorCode() !== '00000') ) {
            //var_dump($sql, $this->instance->errorInfo(), $stmt);
            trigger_error("Erreur lors de l'extraction des données");
            return false;
        }
        $stmt->execute($params);
        $row = $stmt->fetch(\PDO::FETCH_OBJ);
        $stmt->closeCursor();
        return $row;
    }

    public function fetchOne($sql, $params = array())
    {
        $stmt = $this->instance->prepare($sql);
        if ($stmt === false || (!is_null($stmt->errorCode()) && $stmt->errorCode() !== '00000') ) {
            trigger_error("Erreur lors de l'extraction des données");
            return false;
        }
        $stmt->execute($params);
        $row = $stmt->fetch(\PDO::FETCH_NUM);
        $stmt->closeCursor();

        return $row[0];
    }

    public function delete($table, $where, $params = array())
    {
        $sql = <<<"EOT"
    DELETE
      FROM $table
     WHERE $where
EOT;

        $stmt = $this->instance->prepare($sql);
        if ($stmt === false || (!is_null($stmt->errorCode()) && $stmt->errorCode() !== '00000') ) {
            trigger_error("Erreur lors de l'extraction des données");
            return false;
        }
        $stmt->execute($params);
        $stmt->closeCursor();
    }

    public function exec($sql) {
        $this->instance->exec($sql);
        if ($this->instance->errorCode() !== '00000') {
            trigger_error("Erreur SQL : ". $this->instance->errorInfo, E_USER_ERROR);
        }
    }

}
