<?php
require_once 'userModel.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo"hi";
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Assurez-vous que toutes les données sont présentes
    if (!empty($email) && !empty($password)) {
        // Créer une instance du modèle pour ajouter la tâche
        $userModel = new UserModel($pdo);
        $userModel->addUser($email, $password,'user');
        
        if($email == "example@example.com" && $password == "password123"){
            // Rediriger après l'ajout de la tâche
             header("Location: taskForm.php");
        }else{
             // Rediriger après l'ajout de la tâche
             header("Location: user.php");
        }
       
        exit;
    }
}

?>
