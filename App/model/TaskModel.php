<?php
// File: App/Models/TaskModel.php

class TaskModel {
    private $pdo;

    public function __construct($dbConnection) {
        $this->pdo = $dbConnection;
    }

    // Méthode pour ajouter une tâche dans la base de données
    public function addTask($title, $description, $date, $status, $priority) {
        // Préparer la requête SQL d'insertion
        $sql = "INSERT INTO tasks (title_tache, descr_tache, date_tache, status_tache, priority_tache)
                VALUES (:title, :description, :date, :status, :priority)";

        $stmt = $this->pdo->prepare($sql);

        // Exécuter la requête en liant les valeurs
        $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':date' => $date,
            ':status' => $status,
            ':priority' => $priority
        ]);
    }

     // Méthode pour récupérer toutes les tâches
     public function getAllTasks() {
        $sql = "SELECT * FROM tasks";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     // Méthode pour supprimer une tâche
     public function deleteTask($id_tache) {
        $sql = "DELETE FROM tasks WHERE id_tache = :id_tache";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_tache' => $id_tache]);
    }

}
?>
