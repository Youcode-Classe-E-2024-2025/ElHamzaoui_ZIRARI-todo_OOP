<?php
// Démarre une session pour stocker les informations de l'utilisateur une fois connecté
session_start();

// Inclure la configuration de la connexion à la base de données
require 'config.php';

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête SQL pour récupérer l'utilisateur correspondant
    $sql = "SELECT * FROM users WHERE email_user = :email";
    
    // Préparation de la requête
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    // Vérifie si l'utilisateur existe
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si le mot de passe correspond en clair
        if ($password === $user['password_users']) { // Comparaison en texte clair
            // Authentification réussie
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['user_email'] = $user['email_user'];
            $_SESSION['role'] = $user['role_users'];

            // Redirige vers la page appropriée en fonction du rôle
            if ($user['role_users'] == 'admin') {
                header("Location: taskForm.php");
            } else {
                header("Location: user.php");
            }
            exit;
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }
}
?>
