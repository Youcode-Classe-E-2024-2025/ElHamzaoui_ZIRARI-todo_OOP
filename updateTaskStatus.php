<?php
session_start();
require_once 'taskModel.php';
require_once 'config.php';

$taskModel = new TaskModel($pdo);

// Récupérer les données envoyées par AJAX
$data = json_decode(file_get_contents('php://input'), true);
$taskId = $data['taskId'];
$newStatus = $data['status'];

// Vérifier si le statut est valide
$validStatuses = ['to do', 'doing', 'done'];
if (!in_array($newStatus, $validStatuses)) {
    echo json_encode(['success' => false, 'message' => 'Statut invalide']);
    exit;
}

// Mettre à jour le statut de la tâche dans la table 'assignments'
$query = 'UPDATE assignments SET status_tache = :status WHERE task_id = :taskId AND user_id = :userId';
$stmt = $pdo->prepare($query);

// Vous devez définir $userId ici, par exemple, à partir de la session si l'utilisateur est connecté.
$userId = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté

$stmt->bindParam(':status', $newStatus);
$stmt->bindParam(':taskId', $taskId);
$stmt->bindParam(':userId', $userId);  // Ajoutez l'ID utilisateur pour que la mise à jour soit spécifique à un utilisateur

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour']);
}
?>
