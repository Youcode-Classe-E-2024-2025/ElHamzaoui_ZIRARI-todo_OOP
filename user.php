<?php
session_start();
require_once 'taskModel.php';
require_once 'userModel.php';
require_once 'config.php';

$taskModel = new TaskModel($pdo);
$userModel = new UserModel($pdo);

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die("Vous devez être connecté pour voir vos tâches.");
}

$userId = $_SESSION['user_id'];

// Récupérer les tâches assignées à l'utilisateur
$assignedTasks = $taskModel->getTasksByUserId($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Dark Mode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        };
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-gray-200 min-h-screen font-sans transition-colors duration-300">
    <header class="bg-white dark:bg-gray-800 shadow-md py-4 px-6 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <img src="images/logo.png" alt="Logo" class="h-12 w-13 rounded-full">
            <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">TaskFlow</h1>
        </div>
        <div>
            <button id="theme-toggle" class="p-2 rounded-full">
                <i id="theme-icon" class="fas fa-sun text-yellow-500"></i>
            </button>
            <a href="deconnexion.php" class="p-2 rounded-full text-gray-800 dark:text-gray-200 hover:text-gray-500">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </header>

    <div class="container mx-auto py-12 px-4">
        <h1 class="text-4xl font-extrabold text-center mb-12">TaskFlow</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- To Do Section -->
            <div id="todo" class="task-section bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border-t-4 border-blue-500"
                 ondrop="drop(event)" ondragover="allowDrop(event)">
                <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">To Do</h2>
                <ul class="space-y-4">
                    <?php foreach ($assignedTasks as $task): ?>
                        <li id="task-<?php echo $task['id_tache']; ?>" class="task bg-blue-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex justify-between items-center"
                            draggable="true" ondragstart="drag(event)" data-status="to_do">
                            <span><?php echo htmlspecialchars($task['title_tache']); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- In Progress Section -->
            <div id="inprogress" class="task-section bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border-t-4 border-yellow-500"
                 ondrop="drop(event)" ondragover="allowDrop(event)">
                <h2 class="text-2xl font-semibold text-yellow-600 dark:text-yellow-400 mb-4">In Progress</h2>
                <ul class="space-y-4"></ul>
            </div>

            <!-- Done Section -->
            <div id="done" class="task-section bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border-t-4 border-green-500"
                 ondrop="drop(event)" ondragover="allowDrop(event)">
                <h2 class="text-2xl font-semibold text-green-600 dark:text-green-400 mb-4">Done</h2>
                <ul class="space-y-4"></ul>
            </div>
        </div>
    </div>

    <script>
        // Toggle Dark Mode
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const body = document.body;

        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark');
            themeIcon.classList.replace('fa-sun', 'fa-moon');
        }

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark');
            if (body.classList.contains('dark')) {
                themeIcon.classList.replace('fa-sun', 'fa-moon');
                localStorage.setItem('theme', 'dark');
            } else {
                themeIcon.classList.replace('fa-moon', 'fa-sun');
                localStorage.setItem('theme', 'light');
            }
        });

        // Drag-and-Drop Functions
        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drop(ev) {
            ev.preventDefault();
            const data = ev.dataTransfer.getData("text");
            const draggedTask = document.getElementById(data);
            const newStatus = ev.target.id;

            if (ev.target.classList.contains('task-section')) {
                ev.target.appendChild(draggedTask);
            }

            updateTaskStatus(draggedTask, newStatus);
        }

        function updateTaskStatus(taskElement, newStatus) {
            const taskId = taskElement.id.replace('task-', '');

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'updateTaskStatus.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        console.log('Statut de la tâche mis à jour');
                    } else {
                        console.log('Erreur lors de la mise à jour');
                    }
                }
            };

            const data = JSON.stringify({
                taskId: taskId,
                status: newStatus
            });
            xhr.send(data);
        }
    </script>
</body>
</html>
