<?php
// assignController.php
require_once 'assignModel.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $taskId = $_POST['task_id'];
    $status = $_POST['status']; // Récupérer le statut envoyé par le formulaire


    // Vérifier que le statut a bien été sélectionné
    if (empty($status)) {
        // Si aucun statut n'est sélectionné, définir un statut par défaut (ex: 'to_do')
        $status = 'to_do';
    }

    $assignModel = new AssignModel($pdo);
    $assignModel->assignTask($userId, $taskId, $status); // Insérer l'assignation avec le statut

    // Rediriger vers la page d'accueil ou la page actuelle après l'assignation
    header('Location: index.php');
    exit;
}

?>

