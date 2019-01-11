<?php

namespace App\Bdd;

class BddMysql implements BddInterface
{

    protected $host;
    protected $dbname;
    protected $user;
    protected $pass;
    protected $instance;

    public function __construct($host, $dbname, $user, $pass)
    {
        $this->host   = $host;
        $this->dbname = $dbname;
        $this->user   = $user;
        $this->pass   = $pass;
    }

    public function __destruct()
    {
        $this->close();
    }

    public function connect()
    {
        if (!isset($this->instance)) {
            try {
                $this->instance = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
                $this->instance->exec("SET NAMES 'UTF8'");
            } catch (\PDOException $e) {
                trigger_error("Connexion échouée à la base de donnée [$this->dbname] Erreur PDO (".$e->getMessage().")");
            } catch (\Exception $e) {
                trigger_error("Connexion échouée à la base de donnée [$this->dbname] (".$e->getMessage().")");
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
        $stmt->execute($params);
        if ($stmt === false || $stmt->errorCode() !== '00000') {
            trigger_error("Erreur lors de l'extraction des données");
            return false;
        }
        $row = $stmt->fetch(\PDO::FETCH_OBJ);
        $stmt->closeCursor();
        return $row;
    }

    public function fetchOne($sql, $params = array())
    {
        $stmt = $this->instance->prepare($sql);
        $stmt->execute($params);
        if ($stmt === false || $stmt->errorCode() !== '00000') {
            trigger_error("Erreur lors de l'extraction des données");
            return false;
        }
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
        $stmt->execute($params);
        if ($stmt === false || $stmt->errorCode() !== '00000') {
            trigger_error("Erreur lors de l'extraction des données");
            return false;
        }
        $stmt->closeCursor();
    }
}
