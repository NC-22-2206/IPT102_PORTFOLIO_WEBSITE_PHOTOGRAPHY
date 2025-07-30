<?php
// db/db_connection.php

class DBConnection
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'sean_aleta_photography';
    private $conn;

    public function getConnection()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
?>
