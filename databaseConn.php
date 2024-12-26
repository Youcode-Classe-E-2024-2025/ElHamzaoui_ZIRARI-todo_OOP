<?php
class Database {
    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $dbname = "todo_list";
    private $conn;

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
}
?>
