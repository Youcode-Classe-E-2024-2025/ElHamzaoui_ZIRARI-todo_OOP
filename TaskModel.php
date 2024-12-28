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
    
}
?>
