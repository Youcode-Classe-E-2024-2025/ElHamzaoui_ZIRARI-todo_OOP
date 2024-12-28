<?php

class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addTask($email_user, $password_users, $role_users) {
        $sql = "INSERT INTO users (email_user, password_users, role_users) 
                VALUES (?, ?,'user')";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email_user, $password_users, $role_users]);
    }

    // public function getAllTasks() {
    //     $sql = "SELECT * FROM tasks ORDER BY date_tache DESC";
    //     $stmt = $this->pdo->query($sql);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function deleteTask($taskId) {
    //     $sql = "DELETE FROM tasks WHERE id_tache = ?";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute([$taskId]);
    // }

    
    
}
?>