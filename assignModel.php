<?php

class AssignModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer toutes les assignations
    public function getAllAssignments() {
        $sql = "SELECT a.*, u.email_user, t.title_tache 
                FROM assignments a
                JOIN users u ON a.user_id = u.id_user
                JOIN tasks t ON a.task_id = t.id_tache";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     // Assigner une tâche à un utilisateur
     public function assignTask($userId, $taskId, $status = 'to do') {
        $sql = "INSERT INTO assignments (user_id, task_id, status_tache) 
                VALUES (:user_id, :task_id, :status)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':task_id', $taskId, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
    }
}
?>
