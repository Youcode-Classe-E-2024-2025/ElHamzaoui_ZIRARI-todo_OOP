<?php
// Inclure la classe Tache
require_once 'taskModel.php';
require_once 'userModel.php';
require_once 'config.php'; // Inclure la connexion PDO depuis config.php

// Créer une instance de TaskModel en passant l'objet PDO
$taskModel = new TaskModel($pdo);  // Ici, vous passez la connexion PDO à TaskModel
$userModel = new  UserModel($pdo);

$tasks = $taskModel->getAllTasks();  // Appeler la méthode pour obtenir toutes les tâches
$users = $userModel->getAllUsers();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            padding: 20px;
        }

        /* Style de la carte de chaque tâche */
        .task-card {
            background-color: #fff;
            width: 300px;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            position: relative;
        }

        .task-card:hover {
            transform: scale(1.05);
        }

        /* Style du titre de la tâche */
        .task-card h3 {
            margin: 0;
            font-size: 1.2em;
        }

        /* Style pour les détails cachés au survol */
        .task-details {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .task-card:hover .task-details {
            display: block;
        }

        /* Style pour les boutons */
        .task-card button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .task-card button:hover {
            background-color: #45a049;
        }

        /* Style du formulaire */
        form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        form input, form textarea, form select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <header class="bg-blue-600 text-white flex justify-between items-center px-6 py-4">
        <div class="flex items-center">
            <img src="images/logo.png" alt="Logo" class="w-20 h-15 mr-4">
            <h1 class="text-2xl font-bold">Interface Admin</h1>
        </div>
        <button class="flex items-center space-x-2">
        <img src="images/dec.png" alt="Logout" class="w-6 h-6">
        </button>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white p-6 shadow-md">
            <ul class="space-y-4">
                <li><button onclick="showSection('tasks')" class="w-full text-left px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">Tâches</button></li>
                <li><button onclick="showSection('users')" class="w-full text-left px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">Utilisateurs</button></li>
                <li><button onclick="showSection('assignments')" class="w-full text-left px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">Assignements</button></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Buttons in Content Area -->
            <div class="flex justify-between mb-6">
                <button class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" onclick="openModal()">Ajouter une tâche</button>
                <button onclick="openAssignModal()" class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600">
               Assigner une tâche
           </button>
            </div>

            <!-- Content Box for Displaying Sections -->
            <div class="bg-white border border-gray-300 rounded shadow p-6">
                <!-- Sections -->
                <div id="tasks" class="section hidden">
                    <h2 class="text-xl font-bold mb-4">Gestion des Tâches</h2>
                    <p>Voici la liste des tâches.</p>
                    <div class="container">
        <?php foreach ($tasks as $tacheItem): ?>
            <div class="task-card">
                <h3><?php echo htmlspecialchars($tacheItem['title_tache']); ?></h3>
                <div class="task-details">
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($tacheItem['descr_tache']); ?></p>
                    <p><strong>Date d'échéance:</strong> <?php echo htmlspecialchars($tacheItem['date_tache']); ?></p>
                    <p><strong>Priorité:</strong> <?php echo htmlspecialchars($tacheItem['status_tache']); ?></p>
                    <p><strong>Responsable:</strong> <?php echo htmlspecialchars($tacheItem['priority_tache']); ?></p>
                </div>
                <!-- Boutons pour modifier et supprimer -->
                <button onclick="window.location.href='modifier_tache.php?id=<?php echo $tacheItem['id_tache']; ?>'">Modifier</button>
                <button onclick="window.location.href='TaskController.php?id=<?php echo $tacheItem['id_tache']; ?>'">Supprimer</button>
            </div>
        <?php endforeach; ?>
    </div>

                </div>
                <div id="users" class="section hidden">
                    <h2 class="text-xl font-bold mb-4">Gestion des Utilisateurs</h2>
                    <p>Voici la liste des utilisateurs.</p>
                </div>
                <div id="assignments" class="section hidden">
                    <h2 class="text-xl font-bold mb-4">Gestion des Assignements</h2>
                    <p>Voici la liste des assignements.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="taskModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded shadow-lg w-96">
            <h2 class="text-xl font-bold text-center mb-4">Ajouter une Tâche</h2>
            <form id="taskForm" action="TaskController.php" method="POST"  class="space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium">Titre</label>
                    <input type="text" id="title" name="title" required class="w-full px-4 py-2 border rounded">
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium">Description</label>
                    <textarea id="description" name="description" required class="w-full px-4 py-2 border rounded"></textarea>
                </div>
                <div>
                    <label for="date" class="block text-sm font-medium">Date</label>
                    <input type="date" id="date" name="date" required class="w-full px-4 py-2 border rounded">
                </div>
                <div>
                    <label class="block text-sm font-medium">État</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" name="status" value="tache_simple" required class="mr-2"> Tâche simple</label>
                        <label><input type="radio" name="status" value="bug" class="mr-2"> Bug</label>
                        <label><input type="radio" name="status" value="Feature" class="mr-2"> Feature</label>
                    </div>
                </div>
                <div>
                    <label for="priority" class="block text-sm font-medium">Priorité</label>
                    <select id="priority" name="priority" class="w-full px-4 py-2 border rounded">
                        <option value="P1">P1</option>
                        <option value="P2">P2</option>
                        <option value="P3">P3</option>
                    </select>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Enregistrer</button>
                    <button type="button" class="px-6 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="closeModal()">Annuler</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal Assignation -->
<div id="assignModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-xl font-bold text-center mb-4">Assigner une Tâche</h2>
        <form id="assignForm" action="assignController.php" method="POST" class="space-y-4">
            <!-- Liste des utilisateurs -->
            <div>
                <label for="user_id" class="block text-sm font-medium">Utilisateur</label>
                <select id="user_id" name="user_id" required class="w-full px-4 py-2 border rounded">
                    <?php foreach ($users as $user): ?>
                        <option value="<?php echo $user['id_user']; ?>"><?php echo htmlspecialchars($user['email_user']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- Liste des tâches -->
            <div>
                <label for="task_id" class="block text-sm font-medium">Tâche</label>
                <select id="task_id" name="task_id" required class="w-full px-4 py-2 border rounded">
                    <?php foreach ($tasks as $task): ?>
                        <option value="<?php echo $task['id_tache']; ?>"><?php echo htmlspecialchars($task['title_tache']); ?> - <?php echo htmlspecialchars($task['date_tache']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- État de la tâche (par défaut 'to_do') -->
            <div>
                <label for="status" class="block text-sm font-medium">État de la Tâche</label>
                <select id="status" name="status" required class="w-full px-4 py-2 border rounded">
                    <option value="to_do">To Do</option>
                    <option value="doing">Doing</option>
                    <option value="done">Done</option>
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Assigner</button>
                <button type="button" class="px-6 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="closeAssignModal()">Annuler</button>
            </div>
        </form>
    </div>
</div>



    <script>
        function openModal() {
            document.getElementById('taskModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('taskModal').classList.add('hidden');
        }

        function assignTask() {
            alert("Assigner une tâche");
        }

        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => section.classList.add('hidden'));
            document.getElementById(sectionId).classList.remove('hidden');
        }
        // Ouvrir le modal lorsque l'on clique sur "Assigner une tâche"
function openAssignModal() {
    document.getElementById('assignModal').classList.remove('hidden');
}

// Fermer le modal lorsque l'on clique sur "Annuler"
function closeAssignModal() {
    document.getElementById('assignModal').classList.add('hidden');
}

    </script>

</body>
</html>