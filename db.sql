CREATE DATABASE todo_list ;
USE todo_list;


CREATE TABLE tasks (
    id_tache INT AUTO_INCREMENT PRIMARY KEY,  -- Un identifiant unique pour chaque tâche
    title_tache VARCHAR(255) NOT NULL,        -- Le titre de la tâche (chaîne de caractères de max 255 caractères)
    descr_tache TEXT NOT NULL,          -- La description de la tâche (texte libre)
    date_tache DATE NOT NULL,                 -- La date de la tâche
    status_tache ENUM('tache_simple', 'bug', 'Feature') NOT NULL,  -- Le statut de la tâche (tache simple, bug ou feature)
    priority_tache ENUM('P1', 'P2', 'P3') NOT NULL  -- La priorité de la tâche (P1, P2 ou P3)
);

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,  -- Un identifiant unique pour chaque tâche
    email_user VARCHAR(255) NOT NULL,  
    password_users VARCHAR(255) NOT NULL,
    role_users ENUM('user', 'admin') NOT NULL
);

INSERT INTO users (email_user, password_users, role_users)
VALUES ('example@example.com', 'password123', 'admin');

CREATE TABLE assignments (
    id_assignment INT AUTO_INCREMENT PRIMARY KEY,  -- Identifiant unique pour chaque assignment
    task_id INT NOT NULL,                          -- Identifiant de la tâche
    user_id INT NOT NULL,                          -- Identifiant de l'utilisateur
    status_tache ENUM('to do', 'doing', 'done') NOT NULL DEFAULT 'to do',  -- Statut de la tâche
    assigned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date et heure d'assignation
    FOREIGN KEY (task_id) REFERENCES tasks(id_tache) ON DELETE CASCADE,  -- Clé étrangère vers la table tasks
    FOREIGN KEY (user_id) REFERENCES users(id_user) ON DELETE CASCADE   -- Clé étrangère vers la table users
);

ALTER TABLE users
ADD COLUMN nom_user VARCHAR(255) NOT NULL AFTER id_user;
