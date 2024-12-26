<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Admin</title>
   
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-blue-900 text-white flex justify-between items-center p-4">
        <div class="flex items-center space-x-4">
            <img src="asset/images/logo.png" alt="Logo" class="w-10 h-10">
            <h1 class="text-xl font-bold">Interface Admin</h1>
        </div>
        <button class="flex items-center space-x-2 text-white">
            <img src="asset/images/dec.png" alt="Logout" class="w-6 h-6">
        </button>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg p-:4">
            <ul class="space-y-4">
                <li><button onclick="showSection('tasks')" class="w-full text-left bg-gray-200 p-2 rounded hover:bg-gray-300">Tâches</button></li>
                <li><button onclick="showSection('users')" class="w-full text-left bg-gray-200 p-2 rounded hover:bg-gray-300">Utilisateurs</button></li>
                <li><button onclick="showSection('assignments')" class="w-full text-left bg-gray-200 p-2 rounded hover:bg-gray-300">Assignements</button></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <!-- Buttons -->
            <div class="flex justify-between mb-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="addTask()">Ajouter une tâche</button>
                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" onclick="assignTask()">Assigner une tâche</button>
            </div>

            <!-- Content Box -->
            <div class="bg-white shadow-lg rounded p-4">
                <!-- Sections -->
                <div id="tasks" class="section hidden">
                    <h2 class="text-xl font-bold mb-2">Gestion des Tâches</h2>
                    <p>Voici la liste des tâches.</p>
                </div>

                <div id="users" class="section hidden">
                    <h2 class="text-xl font-bold mb-2">Gestion des Utilisateurs</h2>
                    <p>Voici la liste des utilisateurs.</p>
                </div>

                <div id="assignments" class="section hidden">
                    <h2 class="text-xl font-bold mb-2">Gestion des Assignements</h2>
                    <p>Voici la liste des assignements.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="taskModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded p-6 w-96">
            <h2 class="text-xl font-bold mb-4 text-center" id="modalTitle">Ajouter une tâche</h2>
            <form id="taskForm" class="space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium">Titre</label>
                    <input type="text" id="title" class="w-full border rounded px-2 py-1" required>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium">Description</label>
                    <textarea id="description" class="w-full border rounded px-2 py-1" required></textarea>
                </div>
                <div>
                    <label for="date" class="block text-sm font-medium">Date</label>
                    <input type="date" id="date" class="w-full border rounded px-2 py-1" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Type de tâche</label>
                    <div class="space-x-4">
                        <label><input type="radio" name="status" value="tache_simple" required> Tâche simple</label>
                        <label><input type="radio" name="status" value="bug"> Bug</label>
                        <label><input type="radio" name="status" value="Feature"> Feature</label>
                    </div>
                </div>
                <div>
                    <label for="priority" class="block text-sm font-medium">Priorité</label>
                    <select id="priority" class="w-full border rounded px-2 py-1">
                        <option value="P1">P1</option>
                        <option value="P2">P2</option>
                        <option value="P3">P3</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" onclick="saveTask()">Enregistrer</button>
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="closeModal()">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function showSection(section) {
            document.querySelectorAll('.section').forEach(sec => sec.classList.add('hidden'));
            document.getElementById(section).classList.remove('hidden');
        }

        function addTask() {
            document.getElementById('taskModal').classList.remove('hidden');
        }

        function assignTask() {
            alert("Assigner une tâche");
        }

        function saveTask() {
            const title = document.getElementById('title').value.trim();
            const description = document.getElementById('description').value.trim();
            const date = document.getElementById('date').value;
            const priority = document.getElementById('priority').value;
            const status = document.querySelector('input[name="status"]:checked');

            if (!title || !description || !date || !priority || !status) {
                alert("Tous les champs sont requis !");
                return;
            }

            alert("Tâche enregistrée avec succès !");
            closeModal();
        }

        function closeModal() {
            document.getElementById('taskModal').classList.add('hidden');
        }
    </script>
</body>
</html>
