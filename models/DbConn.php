<?php
require("constants.php");
class DbConn
{

    private $charset = "utf8";
    public $dbConn;

    public function __construct()
    {

        // $dsn = "mysql:host=".$this->servername."; dbname=".$this->dbname.";charset=".$this->charset.";
        $dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset={$this->charset}";

        try {
            $this->dbConn = new PDO($dsn, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            echo "Error trying to stablish connection with database" . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function __destruct()
    {
        $this->dbConn = null;
    }

    public function isConnected()
    {
        $res = false;
        if ($this->dbConn) {
            $res = true;
        } else {
            die();
        }
        return ($res);
    }

    // For no condition queries
    public function selectQuery($sql)
    {
        $stmt = null;
        $result = false;
        if (isset($sql) && $sql != "" && isset($this->dbConn)) {
            $stmt = $this->dbConn->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $result = $stmt->fetchAll();
            }
        }
        return ($result);
    }


    public function selectQueryBind($sql, $bindParam)
    {
        $stmt = null;
        $result = false;
        if (isset($sql) && $sql != "" && isset($this->dbConn)) {
            $stmt = $this->dbConn->prepare($sql);
            if ($stmt) {
                $stmt->bindParam(1, $bindParam);
                $stmt->execute();
                $result = $stmt->fetchAll();
            }
        }
        return ($result);
    }
    // For retrieving counts or a single column and sending one parameter
    public function selectQueryBindSingleFetch($sql, $bindParam)
    {
        $stmt = null;
        $result = false;
        if (isset($sql) && $sql != "" && isset($this->dbConn)) {
            $stmt = $this->dbConn->prepare($sql);
            if ($stmt) {
                $stmt->bindParam(1, $bindParam);
                $stmt->execute();
                $result = $stmt->fetchAll();
            }
        }
        return ($result);
    }

    public function selectQueryBindArr($sql, $bindArr)
    {
        $stmt = null;
        $result = false;
        if (isset($sql) && $sql != "" && isset($this->dbConn)) {
            if (isset($bindArr)) {
                $stmt = $this->dbConn->prepare($sql);
                if ($stmt) {
                    $stmt->execute($bindArr);
                    $result = $stmt->fetchAll();
                }
            }
        }
        return ($result);
    }
    // For retrieving counts or a single column and sending more than one parameter
    public function selectQueryBindArrSingleFetch($sql, $bindArr)
    {
        $stmt = null;
        $result = false;
        if (isset($sql) && $sql != "" && isset($this->dbConn)) {
            if (isset($bindArr)) {
                $stmt = $this->dbConn->prepare($sql);
                if ($stmt) {
                    $stmt->execute($bindArr);
                    $result = $stmt->fetch();
                }
            }
        }
        return ($result);
    }

    public function executeQueryBind($sql, $bindParam)
    {
        $stmt = null;
        $result = false;
        if (isset($sql) && $sql != "" && isset($this->dbConn)) {
            $stmt = $this->dbConn->prepare($sql);
            if ($stmt) {
                $stmt->bindParam(1, $bindParam);
                $result = $stmt->execute();
            }
        }
        return ($result);
    }

    public function executeQueryBindArr($sql, $bindArr)
    {
        $stmt = null;
        $result = false;
        if (isset($sql) && $sql != "" && isset($this->dbConn)) {
            $stmt = $this->dbConn->prepare($sql);
            if ($stmt) {
                $result = $stmt->execute($bindArr);
            }
        }
        return ($result);
    }
}
