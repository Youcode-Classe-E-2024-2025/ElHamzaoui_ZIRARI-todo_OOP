-- Active: 1733492701458@@127.0.0.1@3306@gestion_packages
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




