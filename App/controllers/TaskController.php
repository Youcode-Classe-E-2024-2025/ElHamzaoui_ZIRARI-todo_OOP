<?php

require_once '../model/TaskModel.php';

require_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    $taskModel = new TaskModel($pdo);
    $taskModel->addTask($title, $description, $date, $status, $priority);
    exit;
}

$taskModel2 = new TaskModel($pdo);

// Vérifie si l'utilisateur a demandé à supprimer une tâche
if (isset($_GET['delete'])) {
    $taskModel2->deleteTask($_GET['delete']);
    header("Location: /index.php");
    exit;
}

// Récupérer toutes les tâches pour affichage
$tasks = $taskModel2->getAllTasks();

// Inclure la vue
require_once '../Views/taskForm.php';
?>
