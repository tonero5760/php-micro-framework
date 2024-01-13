<?php
class Connect
{
    public $serverName;
    public $userName;
    public $passwd;
    public $db;

    public $conn;

    public $status = false;

    public function __construct($serverName, $userName, $passwd, $db)
    {
        $this->serverName = $serverName;
        $this->userName = $userName;
        $this->passwd = $passwd;
        $this->db = $db;

        try {
            $this->conn = new PDO("mysql:host=" . $this->serverName . ";dbname=" . $this->db, $this->userName, $this->passwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();

        }

    }

     public function select($query, $params = [])
    {

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

      public function insert($query, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            $this->status = true;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}




