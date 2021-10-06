<?php
class DbConn{
    private $user = "admin";
    private $pass = "123";
    private $servername = "localhost";
    private $dbname = "socialdb";
    private $charset = "utf8";
    public $dbConn;
    
    public function __construct() 
    {
        $user = $this->user;
        $pass = $this->pass;

        // $dsn = "mysql:host=".$this->servername."; dbname=".$this->dbname.";charset=".$this->charset.";
        $dsn = "mysql:host={$this->servername}; dbname={$this->dbname};charset={$this->charset}";
        
        try{
            $this->dbConn = new PDO ($dsn, $this->user, $this->pass);
        } catch (PDOException $e){
            echo "Error trying to stablish connection with database" . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function __destruct()
    {
        $this->dbConn = null;
    }

    public function isConnected(){
        $res = false;
        if($this->dbConn){
            $res = true;
        }else {
            die();
        }
        return($res);
    }

    // Execute single query statement. Returns next row as an array indexed by column name
    public function selectQuery($sql)
    {
        $stmt = null;
        $result = false;
        if(isset($sql) && $sql != "" && isset($this->dbConn))
        {
            $stmt = $this->dbConn->prepare($sql);
            if($stmt)
            {
                $stmt->execute();
                $result = $stmt->fetchAll();
            }

        }
        return($result);
    }

    public function executeQuery($sql)
    {
        $stmt = null;
        $result = false;
        if(isset($sql) && $sql != "" && isset($this->dbConn))
        {
            $stmt = $this->dbConn->prepare($sql);
            if($stmt)
            {
                $result=$stmt->execute();
            }

        }
        return($result);  
    }


}

?>