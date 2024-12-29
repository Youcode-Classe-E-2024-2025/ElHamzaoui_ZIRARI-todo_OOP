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

    public function modifierTache($id, $titre, $description, $datetache, $status, $priorite) {
        // Requête SQL pour mettre à jour la tâche
        $sql = "UPDATE tasks SET 
                    title_tache = :titre, 
                    descr_tache = :description, 
                    date_tache = :datetache, 
                    status_tache = :status, 
                    priority_tache = :priorite 
                WHERE id_tache = :id";
    
        // Préparer la requête
        $stmt = $this->pdo->prepare($sql);
    
        // Lier les paramètres
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':datetache', $datetache);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':priorite',  $priorite);
    
        // Exécuter la requête
        $stmt->execute();
    }

    // TaskModel.php
public function assignTaskToUser($taskId, $userId) {
    // Insertion dans la table d'assignation (adaptez en fonction de votre base de données)
    $query = "INSERT INTO assignments (task_id, user_id) VALUES (:task_id, :user_id)";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':task_id', $taskId);
    $stmt->bindParam(':user_id', $userId);

    return $stmt->execute();
}

    // TaskModel.php
public function getTasksByUserId($userId) {
    $query = "SELECT t.* FROM tasks t
              JOIN assignments ta ON t.id_tache = ta.task_id
              WHERE ta.user_id = :user_id";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>
