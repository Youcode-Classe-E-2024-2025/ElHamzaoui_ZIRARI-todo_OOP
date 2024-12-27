<?php

class TaskModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addTask($title, $description, $date, $status, $priority) {
        $sql = "INSERT INTO tasks (title_tache, descr_tache, date_tache, status_tache, priority_tache) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$title, $description, $date, $status, $priority]);
    }

    public function getAllTasks() {
        $sql = "SELECT * FROM tasks ORDER BY date_tache DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteTask($taskId) {
        $sql = "DELETE FROM tasks WHERE id_tache = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$taskId]);
    }
}
?>
