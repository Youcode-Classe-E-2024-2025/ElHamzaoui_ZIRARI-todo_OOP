<?php
require_once '../model/TaskModel.php';
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    $taskModel = new TaskModel($pdo);
    $taskModel->addTask($title, $description, $date, $status, $priority);

    header("Location: /index.php?task=added");
    exit;
}
?>
