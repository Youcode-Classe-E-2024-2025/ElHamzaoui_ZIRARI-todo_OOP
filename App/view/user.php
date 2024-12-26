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
        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <img src="../logo.png" class="h-10 w-10 rounded-full">
            <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">TaskFlow</h1>
        </div>

        <!-- Icons -->
        <div class="flex items-center space-x-6">
            <!-- Dark Mode Toggle -->
            <button id="theme-toggle" class="p-2 bg-gray-200 dark:bg-gray-700 rounded-full shadow-md">
                <svg id="theme-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-7.364l-1.414 1.414M6.05 17.95l-1.414-1.414M18.364 18.364l-1.414-1.414M6.05 6.05L4.636 7.464M12 8a4 4 0 100 8 4 4 0 000-8z" />
                </svg>
            </button>

          
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto py-12 px-4">
        <!-- Page Title -->
        <h1 class="text-4xl font-extrabold text-center mb-12">TaskFlow Dashboard</h1>

        <!-- Sections -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- To Do Section -->
            <div id="todo" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border-t-4 border-blue-500">
                <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">To Do</h2>
                <ul class="space-y-4">
                    <li class="task bg-blue-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex justify-between items-center">
                        <span>Design Homepage</span>
                        <button class="move-btn bg-blue-500 text-white px-3 py-1 rounded-full text-sm">Move</button>
                    </li>
                </ul>
            </div>

            <!-- In Progress Section -->
            <div id="inprogress" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border-t-4 border-yellow-500">
                <h2 class="text-2xl font-semibold text-yellow-600 dark:text-yellow-400 mb-4">In Progress</h2>
                <ul class="space-y-4">
                    <li class="task bg-yellow-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex justify-between items-center">
                        <span>Fix Navbar Bug</span>
                        <button class="move-btn bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">Move</button>
                    </li>
                </ul>
            </div>

            <!-- Done Section -->
            <div id="done" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border-t-4 border-green-500">
                <h2 class="text-2xl font-semibold text-green-600 dark:text-green-400 mb-4">Done</h2>
                <ul class="space-y-4">
                    <li class="task bg-green-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex justify-between items-center">
                        <span>Deploy to Server</span>
                        <button class="move-btn bg-green-500 text-white px-3 py-1 rounded-full text-sm">Move</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

   
</body>
</html>
