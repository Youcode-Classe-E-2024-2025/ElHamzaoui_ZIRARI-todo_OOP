<?php
include_once 'databaseConn.php';

class TaskModel {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function saveTask($title, $description, $date, $status, $priority) {
        $query = "INSERT INTO tasks (title_tache, descr_tache, date_tache, status_tache, priority_tache) 
                  VALUES (:title, :description, :date, :status, :priority)";

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':priority', $priority);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
