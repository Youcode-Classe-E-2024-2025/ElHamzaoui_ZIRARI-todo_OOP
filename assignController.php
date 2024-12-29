<?php
// assignController.php
require_once 'assignModel.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $taskId = $_POST['task_id'];
    $status = $_POST['status'];

    $assignModel = new AssignModel($pdo);
    $assignModel->assignTask($userId, $taskId, $status);

    // Rediriger vers la page d'accueil ou la page actuelle après l'assignation
    header('Location: index.php');
    exit;
}
?>