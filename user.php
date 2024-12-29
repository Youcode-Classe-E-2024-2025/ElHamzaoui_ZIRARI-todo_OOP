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
    <!-- Ajouter Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-gray-200 min-h-screen font-sans transition-colors duration-300">
    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow-md py-4 px-6 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <img src="images/logo.png" alt="Logo" class="h-12 w-13 rounded-full">
            <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">TaskFlow</h1>
        </div>
        
        <!-- Ajouter un bouton pour basculer entre le mode sombre et clair -->
        <button id="theme-toggle" class="p-2 rounded-full">
            <i id="theme-icon" class="fas fa-sun text-yellow-500"></i> <!-- Icône du soleil au départ -->
        </button>
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

        // Vérifier si un thème est déjà enregistré dans le localStorage
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark');
            themeIcon.classList.replace('fa-sun', 'fa-moon'); // Icône de la lune
        }

        // Toggle Dark Mode
        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark');
            
            // Changer l'icône en fonction du mode actuel
            if (body.classList.contains('dark')) {
                themeIcon.classList.replace('fa-sun', 'fa-moon'); // Lune en mode sombre
                localStorage.setItem('theme', 'dark'); // Sauvegarder le thème dans localStorage
            } else {
                themeIcon.classList.replace('fa-moon', 'fa-sun'); // Soleil en mode clair
                localStorage.setItem('theme', 'light'); // Sauvegarder le thème dans localStorage
            }
        });
    </script>
</body>
</html>
