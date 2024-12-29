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
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-gray-200 min-h-screen font-sans transition-colors duration-300">
    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow-md py-4 px-6 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <img src="images/logo.png" alt="Logo" class="h-12 w-13 rounded-full">
            <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">TaskFlow</h1>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto py-12 px-4">
        <h1 class="text-4xl font-extrabold text-center mb-12">TaskFlow</h1>

        <!-- Sections -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- To Do Section -->
            <div id="todo" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border-t-4 border-blue-500">
                <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">To Do</h2>
                <ul class="space-y-4">
                    <?php foreach ($assignedTasks as $task): ?>
                        <li class="task bg-blue-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex justify-between items-center">
                            <span><?php echo htmlspecialchars($task['title_tache']); ?></span>
                            <button class="move-btn bg-blue-500 text-white px-3 py-1 rounded-full text-sm">Déplacer</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- In Progress Section -->
            <div id="inprogress" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border-t-4 border-yellow-500">
                <h2 class="text-2xl font-semibold text-yellow-600 dark:text-yellow-400 mb-4">In Progress</h2>
                <ul class="space-y-4">
                    <!-- You can populate this section with tasks based on their status -->
                </ul>
            </div>

            <!-- Done Section -->
            <div id="done" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border-t-4 border-green-500">
                <h2 class="text-2xl font-semibold text-green-600 dark:text-green-400 mb-4">Done</h2>
                <ul class="space-y-4">
                    <!-- You can populate this section with tasks based on their status -->
                </ul>
            </div>
        </div>
    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const body = document.body;

        // Toggle Dark Mode
        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark');
            if (body.classList.contains('dark')) {
                themeIcon.innerHTML = `...`; // Update icon
            } else {
                themeIcon.innerHTML = `...`; // Update icon
            }
        });
    </script>
</body>
</html>
