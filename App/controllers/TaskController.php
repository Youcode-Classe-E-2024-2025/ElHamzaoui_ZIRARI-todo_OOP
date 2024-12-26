<?php
include_once 'TaskModel.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new TaskModel();
    }

    public function createTask($title, $description, $date, $status, $priority) {
        // Validations ici si nécessaire
        if (empty($title) || empty($description) || empty($date) || empty($status) || empty($priority)) {
            return false;
        }

        // Appel au modèle pour insérer la tâche
        if ($this->taskModel->saveTask($title, $description, $date, $status, $priority)) {
            return true;
        }
        return false;
    }
}
?>
