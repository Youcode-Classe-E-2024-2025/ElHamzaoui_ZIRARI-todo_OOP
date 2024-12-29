// assignModel.php
class AssignModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Méthode pour ajouter un assignement
    public function assignTask($userId, $taskId, $status) {
        $stmt = $this->pdo->prepare("INSERT INTO assignements (user_id, task_id, status) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $taskId, $status]);
    }

    // Méthode pour obtenir tous les assignements
    public function getAllAssignments() {
        $stmt = $this->pdo->query("SELECT a.*, u.email_user, t.title_tache FROM assignements a 
                                   JOIN users u ON a.user_id = u.id_user
                                   JOIN tasks t ON a.task_id = t.id_tache");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
