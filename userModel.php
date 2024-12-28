<?php

class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addUser($email_user, $password_users, $role_users) {
        // Ne codons plus en dur le rôle 'user', mais utilisons un paramètre
        $sql = "INSERT INTO users (email_user, password_users, role_users) 
                VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        
        // Passer les 3 paramètres nécessaires
        $stmt->execute([$email_user, $password_users, $role_users]);
    }

    // Les autres méthodes sont commentées, donc je ne les modifie pas ici.
}

?>