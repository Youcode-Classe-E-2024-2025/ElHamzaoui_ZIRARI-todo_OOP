function showSection(section) {
    // Hide all sections
    document.querySelectorAll('.section').forEach(function(sec) {
        sec.classList.remove('active');
    });

    // Show the clicked section
    document.getElementById(section).classList.add('active');
}

function addTask() {
}

function assignTask() {
    alert("Assigner une tâche");
    // Logic for assigning a task goes here
}

function saveTask() {
    // Récupérer les éléments du formulaire
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const date = document.getElementById('date').value;
    const priority = document.getElementById('priority').value;
    const status = document.querySelector('input[name="status"]:checked');

    // Validation de la date (doit être aujourd'hui ou dans le futur, jusqu'à 2027)
    const today = new Date();
    const maxDate = new Date('2027-12-31');
    const selectedDate = new Date(date);
    if (!date) {
        alert("La date est requise.");
        return false;
    } else if (selectedDate < today) {
        alert("La date ne peut pas être dans le passé.");
        return false;
    } else if (selectedDate > maxDate) {
        alert("La date ne peut pas être après le 31 décembre 2027.");
        return false;
    }

    // Validation du titre (doit contenir uniquement des lettres et des espaces)
    const titleRegex = /^[A-Za-z\s]+$/;
    if (title.trim() === "") {
        alert("Le titre est requis.");
        return false;
    } else if (!titleRegex.test(title)) {
        alert("Le titre ne peut contenir que des lettres et des espaces.");
        return false;
    }

    // Validation de la description (doit contenir uniquement des lettres et des espaces)
    const descriptionRegex = /^[A-Za-z\s]+$/;
    if (description.trim() === "") {
        alert("La description est requise.");
        return false;
    } else if (!descriptionRegex.test(description)) {
        alert("La description ne peut contenir que des lettres et des espaces.");
        return false;
    }

    // Validation du statut (doit être sélectionné)
    if (!status) {
        alert("Le statut est requis.");
        return false;
    }

    // Validation de la priorité
    if (!priority) {
        alert("La priorité est requise.");
        return false;
    }

    // Si tout est valide, soumettre le formulaire
    // alert("Tâche enregistrée avec succès!");
    // Ici, tu peux ajouter le code pour sauvegarder la tâche, par exemple en appelant une fonction pour envoyer les données au serveur
    // closeModal(); // Décommente si tu veux fermer le modal après enregistrement
    return true;  // Retourne true pour indiquer que la validation a réussi
}

// Fonction pour fermer le modal
function closeModal() {
    document.getElementById('taskModal').style.display = 'none';
}
