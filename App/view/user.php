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

   
</body>
</html>
