<?php
require_once 'TaskModel.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    // Assurez-vous que toutes les données sont présentes
    if (!empty($title) && !empty($description) && !empty($date) && !empty($status) && !empty($priority)) {
        // Créer une instance du modèle pour ajouter la tâche
        $taskModel = new TaskModel($pdo);
        $taskModel->addTask($title, $description, $date, $status, $priority);

        // Rediriger après l'ajout de la tâche
        header("Location: index.php");
        exit;
    }
}

// Code pour supprimer une tâche
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    $taskModel = new TaskModel($pdo);
    $taskModel->deleteTask($taskId);
    header("Location: index.php");
    exit;
}

?>
