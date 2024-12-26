<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page de Connexion</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-200 flex items-center justify-center h-screen">
  <div class="bg-gray-800 shadow-lg rounded-lg flex w-3/4 max-w-4xl">
    <!-- Section gauche -->
    <div class="w-1/2 bg-gray-700 text-gray-200 p-8 flex flex-col justify-center items-center">
    <img src="asset/images/logo.png" alt="Logo"  class="w-30 h-30 mb-4">
    
      <h1 class="text-3xl font-bold mb-2">Bienvenue sur ToDo</h1>
      <p class="text-center">
        Organisez vos tâches efficacement et améliorez votre productivité avec notre gestionnaire simple et intuitif.
      </p>
    </div>
    <!-- Section droite -->
    <div class="w-1/2 p-8">
      <h2 class="text-2xl font-bold text-gray-100 mb-4">Connexion</h2>
      <form id="loginForm" class="space-y-4">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-300">Adresse Email</label>
          <input type="email" id="email" name="email" required
                 class="w-full mt-1 px-4 py-2 border border-gray-600 rounded-lg shadow-sm bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <p id="emailError" class="text-red-500 text-sm hidden">Veuillez entrer une adresse email valide.</p>
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-300">Mot de Passe</label>
          <input type="password" id="password" name="password" required
                 class="w-full mt-1 px-4 py-2 border border-gray-600 rounded-lg shadow-sm bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <p id="passwordError" class="text-red-500 text-sm hidden">Le mot de passe doit contenir au moins 6 caractères.</p>
        </div>
        <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">
          Se Connecter
        </button>
      </form>
      <p class="text-sm text-gray-400 mt-4 text-center">
        Pas encore inscrit ? <a href="#" class="text-blue-400 hover:underline">Créer un compte</a>
      </p>
    </div>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      // Empêche l'envoi du formulaire
      event.preventDefault();

      // Récupération des champs
      const email = document.getElementById('email');
      const password = document.getElementById('password');
      const emailError = document.getElementById('emailError');
      const passwordError = document.getElementById('passwordError');

      // Réinitialisation des messages d'erreur
      emailError.classList.add('hidden');
      passwordError.classList.add('hidden');

      let valid = true;

      // Validation de l'email
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!email.value || !emailRegex.test(email.value)) {
        emailError.classList.remove('hidden');
        valid = false;
      }

      // Validation du mot de passe
      if (!password.value || password.value.length < 6) {
        passwordError.classList.remove('hidden');
        valid = false;
      }

      // Si tout est valide, soumettre le formulaire
      if (valid) {
        alert('Connexion réussie !');
        // Vous pouvez ici envoyer le formulaire avec `this.submit();`
      }
    });
  </script>
</body>
</html>
