<?php

class Database {
    
    private $host;
    private $port;
    private $username;
    private $password;
    private $db;
    
    private $conn;

    public function __construct($host, $port, $username, 
                                $password, $db) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
    }

    public function getConnection() {
        $connUrl = "mysql:host=$this->host;
                    port=$this->port;
                    dbname=$this->db;
                    charset=utf8mb4;";

        $this->conn = new PDO($connUrl, 
                            $this->username, 
                            $this->password);

        return $this->conn;
    }
}

$database = new Database(
    "localhost",
    3306,
    "root",
    "",
    "siteadm"
);
$conn = $database->getConnection();
?>