<?php

 require_once 'App/view/taskForm.php';

if (isset($_GET['task']) && $_GET['task'] === 'added') {
    echo '<p>Tâche ajoutée avec succès!</p>';
}
?>
