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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            width: 450px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .modal-content h2 {
            font-size: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
        }

        .modal-content label {
            margin-bottom: 5px;
            font-size: 14px;
        }

        .modal-content input, .modal-content textarea, .modal-content select {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modal-content button {
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #3182ce;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .modal-content button.cancel {
            background-color: #e53e3e;
        }

        .modal-content button:hover {
            opacity: 0.9;
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
                <button class="btn-add" onclick="openModal()">Ajouter une tâche</button>
                <button class="btn-assign" onclick="assignTask()">Assigner une tâche</button>
            </div>

            <!-- Content Box for Displaying Sections -->
            <div class="content-box">
                <!-- Sections -->
                <div id="tasks" class="section">
                    <h2>Gestion des Tâches</h2>
                    <p>Voici la liste des tâches.</p>
                </div>
                <div id="users" class="section">
                    <h2>Gestion des Utilisateurs</h2>
                    <p>Voici la liste des utilisateurs.</p>
                </div>
                <div id="assignments" class="section">
                    <h2>Gestion des Assignements</h2>
                    <p>Voici la liste des assignements.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="taskModal" class="modal">
        <div class="modal-content">
            <h2>Ajouter une Tâche</h2>
            <form id="taskForm" action="controllers/TaskController.php" method="POST">
            <!-- require_once 'App/view/taskForm.php'; -->
                <div>
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" required />
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                <div>
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required />
                </div>
                <div>
                    <label>État</label>
                    <div>
                        <label><input type="radio" name="status" value="tache_simple" required /> Tâche simple</label>
                        <label><input type="radio" name="status" value="bug" /> Bug</label>
                        <label><input type="radio" name="status" value="Feature" /> Feature</label>
                    </div>
                </div>
                <div>
                    <label for="priority">Priorité</label>
                    <select id="priority" name="priority">
                        <option value="P1">P1</option>
                        <option value="P2">P2</option>
                        <option value="P3">P3</option>
                    </select>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <button type="submit">Enregistrer</button>
                    <button type="button" class="cancel" onclick="closeModal()">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('taskModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('taskModal').style.display = 'none';
        }

        function assignTask() {
            alert("Assigner une tâche");
            // Logic for assigning a task goes here
        }
    </script>

</body>
</html>
