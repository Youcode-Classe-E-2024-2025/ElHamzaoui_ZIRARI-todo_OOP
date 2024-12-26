<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Admin</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7fafc;
        }

        /* Header */
        header {
            background-color: #3182ce;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
        }

        header img {
            width: 40px;
            height: 40px;
            margin-right: 15px;
        }

        header h1 {
            font-size: 24px;
            font-weight: bold;
        }

        header button {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar button {
            width: 100%;
            padding: 10px;
            text-align: left;
            background-color: #edf2f7;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        .sidebar button:hover {
            background-color: #e2e8f0;
        }

        /* Main Content Area */
        .main-content {
            padding: 20px;
            width: calc(100% - 250px);
            background-color: white;
        }

        .main-content .buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .main-content button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .main-content .btn-add {
            background-color: #3182ce;
            color: white;
            border: none;
        }

        .main-content .btn-assign {
            background-color: #48bb78;
            color: white;
            border: none;
        }

        /* Content Box */
        .content-box {
            border: 2px solid #e2e8f0; /* Encadrer la zone */
            border-radius: 8px; /* Coins arrondis */
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Box shadow */
            padding: 20px;
        }

        /* Sections */
        .section {
            display: none;
        }

        /* Visible Section */
        .section.active {
            display: block;
        }

        /* Content Styles */
        .section h2 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section p {
            font-size: 16px;
        }

    </style>
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

    <!-- Script for handling the display of sections -->
    <script>
        function showSection(section) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(function(sec) {
                sec.classList.remove('active');
            });

            // Show the clicked section
            document.getElementById(section).classList.add('active');
        }

        function addTask() {
            alert("Ajouter une tâche");
            // Logic for adding a task goes here
        }

        function assignTask() {
            alert("Assigner une tâche");
            // Logic for assigning a task goes here
        }
    </script>
</body>
</html>
