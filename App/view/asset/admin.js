function showSection(section) {
    // Hide all sections
    document.querySelectorAll('.section').forEach(function(sec) {
        sec.classList.remove('active');
    });

    // Show the clicked section
    document.getElementById(section).classList.add('active');
}

function addTask() {
    alert("Ajouter une tâche");
    // Logic for adding a task goes here
}

function assignTask() {
    alert("Assigner une tâche");
    // Logic for assigning a task goes here
}