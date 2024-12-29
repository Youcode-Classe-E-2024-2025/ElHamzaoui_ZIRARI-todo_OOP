<?php
require_once 'userModel.php';
require_once 'config.php';
session_start(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo"hi";
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Assurez-vous que toutes les données sont présentes
    if (!empty($username) && !empty($email) && !empty($password)) {
        // Créer une instance du modèle pour ajouter la tâche
        $userModel = new UserModel($pdo);
        $userModel->addUser($username, $email, $password,'user');
             header("Location: user.php");
        exit;
    }
}

?>
