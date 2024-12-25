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

     <!--  Section du Modal  -->
     <section id="section2">
        <div id="taskModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden ">
            <div class="bg-white p-8 rounded-lg shadow-lg md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                <h2 class="text-xl font-semibold mb-4 ml-20" id="modalTitle">Ajouter une tâche</h2>
                <form id="taskForm">
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Titre</label>
                        <input type="text" id="title" class="w-full border p-2 rounded" required />
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Description</label>
                        <textarea id="description" class="w-full border p-2 rounded" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Date</label>
                        <input type="date" id="date" class="w-full border p-2 rounded" required />
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium">État</label>
                        <div class="flex gap-4">
                            <label><input type="radio" name="status" value="todo" required /> To-Do</label>
                            <label><input type="radio" name="status" value="doing" /> Doing</label>
                            <label><input type="radio" name="status" value="done" /> Done</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Priorité</label>
                        <select id="priority" class="w-full border p-2 rounded">
                            <option value="P1">P1</option>
                            <option value="P2">P2</option>
                            <option value="P3">P3</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button onclick="saveTask()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
                        <button onclick="closeModal()" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Anuler</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--  Section du Modal  -->

     <!-- Script for handling the display of sections -->
     <script src="asset/admin.js"> </script>
</body>
</html>
