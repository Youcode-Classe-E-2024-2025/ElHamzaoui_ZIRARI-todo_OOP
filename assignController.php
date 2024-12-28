<?php
session_start();
require_once 'taskModel.php';
require_once 'userModel.php';
require_once 'config.php';

$taskModel = new TaskModel($pdo);
$userModel = new UserModel($pdo);

// Assurez-vous que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die("Vous devez être connecté pour assigner des tâches.");
}

$userId = $_SESSION['user_id'];
$taskId = $_POST['task_id'];

// Assigner la tâche à l'utilisateur
$assignSuccess = $taskModel->assignTaskToUser($taskId, $userId);

if ($assignSuccess) {
    // Rediriger vers la page user.php ou afficher un message de succès
    header('Location: user.php');
    exit;
} else {
    echo "Erreur lors de l'assignation de la tâche.";
}
?>
