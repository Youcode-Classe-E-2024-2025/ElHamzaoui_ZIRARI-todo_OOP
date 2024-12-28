<?php
// Inclure la classe Tache
require_once 'TaskModel.php';
require_once 'config.php'; // Inclure la connexion PDO depuis config.php

// Vérifier si l'ID de la tâche est passé en paramètre
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Créer une instance de TaskModel en passant l'objet PDO
    $taskModel = new TaskModel($pdo);  

    // Récupérer la tâche pour l'afficher
    $sql = "SELECT * FROM tasks WHERE id_tache = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $tacheActuelle = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si la tâche existe, afficher le formulaire de modification
    if ($tacheActuelle) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les nouvelles valeurs du formulaire
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $status = $_POST['status'];
            $priority = $_POST['priority'];

            // Modifier la tâche dans la base de données
            $taskModel->modifierTache($id, $title, $description, $date, $status, $priority);

            // Rediriger vers la page index.php après la modification
            header('Location: index.php');
            exit();
        }
    } else {
        echo "Tâche non trouvée.";
    }
} else {
    echo "Aucun ID de tâche fourni.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Tâche</title>
</head>
<body>

<h1>Modifier la tâche</h1>

<form action="modifier_tache.php?id=<?php echo $id; ?>" method="post">
    <label for="title">Titre de la tâche :</label><br>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($tacheActuelle['title_tache']); ?>" required><br><br>

    <label for="description">Description de la tâche :</label><br>
    <textarea id="description" name="description" rows="4" cols="50" required><?php echo htmlspecialchars($tacheActuelle['descr_tache']); ?></textarea><br><br>

    <label for="due_date">Date d'échéance :</label><br>
    <input type="date" id="due_date" name="date" value="<?php echo htmlspecialchars($tacheActuelle['date_tache']); ?>" required><br><br>

    <label for="priority">Priorité :</label><br>
    <select id="priority" name="priority" required>
        <option value="P1" <?php if ($tacheActuelle['priority_tache'] == 'P1') echo 'selected'; ?>>P1</option>
        <option value="P2" <?php if ($tacheActuelle['priority_tache'] == 'P2') echo 'selected'; ?>>P2</option>
        <option value="P3" <?php if ($tacheActuelle['priority_tache'] == 'P3') echo 'selected'; ?>>P3</option>
    </select><br><br>

    <div>
        <label class="block text-sm font-medium">État</label>
        <div class="flex space-x-4">
            <label><input type="radio" name="status" value="tache_simple" <?php if ($tacheActuelle['status_tache'] == 'tache_simple') echo 'checked'; ?> required class="mr-2"> Tâche simple</label>
            <label><input type="radio" name="status" value="bug" <?php if ($tacheActuelle['status_tache'] == 'bug') echo 'checked'; ?> class="mr-2"> Bug</label>
            <label><input type="radio" name="status" value="Feature" <?php if ($tacheActuelle['status_tache'] == 'Feature') echo 'checked'; ?> class="mr-2"> Feature</label>
        </div>
    </div>
    <input type="submit" value="Modifier Tâche">
</form>

</body>
</html>
