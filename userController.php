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
        
        if($email == "example@example.com" && $password == "password123"){
            $_SESSION['user_id'] = "example@example.com";
            $_SESSION['user_id'] = "password123";
            // Rediriger après l'ajout de la tâche
             header("Location: taskForm.php");
        }else{
            $_SESSION['user_id'] = $email['id_user'];
            $_SESSION['user_id'] = $password['id_user'];
             // Rediriger après l'ajout de la tâche
             header("Location: user.php");
        }
       
        exit;
    }
}

?>
