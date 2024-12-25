<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Admin</title>
    <link rel="stylesheet" href="asset/admin.css">
</head>
<body>

    <!-- Header -->
    <header>
        <div style="display: flex; align-items: center;">
            <!-- Logo -->
            <img src="https://via.placeholder.com/50" alt="Logo">
            <h1>Interface Admin</h1>
        </div>
        <!-- Logout Icon -->
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
                <path d="M17 16l4-4-4-4M7 12H3m4 0c2 0 4 2 4 4s-2 4-4 4H3c-1.1 0-2-.9-2-2v-8c0-1.1.9-2 2-2h4c2 0 4 2 4 4s-2 4-4 4H7z"></path>
            </svg>
        </button>
    </header>

    <div style="display: flex;">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul>
                <li><button onclick="showSection('tasks')">Tâches</button></li>
                <li><button onclick="showSection('users')">Utilisateurs</button></li>
                <li><button onclick="showSection('assignments')">Assignements</button></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Buttons in Content Area -->
            <div class="buttons">
                <button class="btn-add" onclick="addTask()">Ajouter une tâche</button>
                <button class="btn-assign" onclick="assignTask()">Assigner une tâche</button>
            </div>

            <!-- Content Box for Displaying Sections -->
            <div class="content-box">
                <!-- Sections -->
                <div id="tasks" class="section">
                    <h2>Gestion des Tâches</h2>
                    <p>Voici la liste des tâches.</p>
                    <!-- Task content goes here -->
                </div>

                <div id="users" class="section">
                    <h2>Gestion des Utilisateurs</h2>
                    <p>Voici la liste des utilisateurs.</p>
                    <!-- User content goes here -->
                </div>

                <div id="assignments" class="section">
                    <h2>Gestion des Assignements</h2>
                    <p>Voici la liste des assignements.</p>
                    <!-- Assignments content goes here -->
                </div>
            </div>
        </div>
    </div>

   
</body>
</html>
