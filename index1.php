<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        /* Animation du titre */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animated-title {
            animation: fadeIn 1s ease-out;
        }
    </style>
</head>
<body class="font-sans bg-[#1d3557]">

    <!-- Header -->
    <header class="bg-[#1d3557] text-white p-4 flex justify-between items-center">
        <!-- Logo à gauche : Remplacer le texte par une image -->
        <div class="text-2xl font-bold">
        <img src="images/logo.png" alt="Logo"  class="h-12 w-13 rounded-full">
        </div>
        <!-- Icons à droite : Remplacer les icônes SVG par de nouvelles icônes plus explicites -->
        <div class="flex space-x-4">
            <!-- Première icône : Recherche -->
            <a href="inscription.php" class="text-white hover:text-gray-300" title="Recherche">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 12v9h6v-6h4v6h6v-9" />
            </svg>

            </a>
            <!-- Deuxième icône : Paramètres -->
            <a href="login.php" class="text-white hover:text-gray-300" title="Paramètres">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3a2 2 0 114 0 2 2 0 01-4 0zM4 14c0-1.5 2.5-2.5 6-2.5s6 1 6 2.5v5h-12v-5z" />
            </svg>
            </a>
        </div>
    </header>

    <!-- Main Section -->
    <main class="flex justify-center items-center h-screen bg-gradient-to-r from-[#1d3557] to-[#457b9d]">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-white animated-title" data-aos="fade-up" data-aos-duration="1000">TaskFlow </h1>
            <h1 class="text-4xl font-bold text-white animated-title" data-aos="fade-up" data-aos-duration="1000">Bienvenue sur notre site</h1>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#1d3557] text-white py-4 text-center">
        <p>&copy; 2024 MonSite. Tous droits réservés.</p>
    </footer>

    <script>
        // Initialisation de l'animation AOS
        AOS.init();
    </script>
</body>
</html>
