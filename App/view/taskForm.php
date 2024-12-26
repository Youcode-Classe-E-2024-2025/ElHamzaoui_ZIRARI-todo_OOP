<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <header class="bg-blue-600 text-white flex justify-between items-center px-6 py-4">
        <div class="flex items-center">
            <img src="asset/images/logo.png" alt="Logo" class="w-10 h-10 mr-4">
            <h1 class="text-2xl font-bold">Interface Admin</h1>
        </div>
        <button class="flex items-center space-x-2">
        <img src="asset/images/dec.png" alt="Logout" class="w-6 h-6">
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
                <button class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600" onclick="assignTask()">Assigner une tâche</button>
            </div>

            <!-- Content Box for Displaying Sections -->
            <div class="bg-white border border-gray-300 rounded shadow p-6">
                <!-- Sections -->
                <div id="tasks" class="section hidden">
                    <h2 class="text-xl font-bold mb-4">Gestion des Tâches</h2>
                    <p>Voici la liste des tâches.</p>
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
            <form id="taskForm" method="POST" action="App/Controllers/TaskController.php" class="space-y-4">
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
    </script>

</body>
</html>
