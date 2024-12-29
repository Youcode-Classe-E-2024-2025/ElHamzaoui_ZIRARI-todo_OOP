# ElHamzaoui_ZIRARI-todo_OOP

## Contexte du projet
TaskFlow est un projet d'initiation à la Programmation Orientée Objet (POO) à travers la création d'un gestionnaire de tâches simple.

## Fonctionnalités principales

**Intégration UI et Ajout Dynamique**

-   Formulaires permettant l'ajout des taches avec des champs .
-   Formulaires permettant l'ajout des utilisateurs avec des champs .
-   Formulaires permettant d'éffectuer des assignements des taches pour des utilisateurs .

**L'affichage des interfaces**
-   Permettre l'affichage des utilisateurs
-   Permettre l'affichage des taches
-   Permettre l'affichage des assignements éffecutées

## Technologies Requises
-   HTML
-   CSS tailwind 
-   JS  natif
-   PHP natif
-   SQL ( base de donnée MySQL)

## Table des matières

-  Lien vers le repository GitHub contenant :[Repo · ElHamzaoui_ZIRARI-todo_OOP](https://github.com/Youcode-Classe-E-2024-2025/ElHamzaoui_ZIRARI-todo_OOP)

-  Le diagramme de classes :
 ![Structure du projet](images/DC.png)

## Installation

### Cloner le dépôt

Pour installer et démarrer l'application, commencez par cloner ce dépôt sur votre machine locale :
 

# Installation et Configuration du Projet

## Prérequis

Avant de cloner ce projet, assurez-vous d'avoir les outils suivants installés :

1. **Serveur Web** : Apache (inclus dans XAMPP, WAMP, ou MAMP).
2. **Base de Données** : MySQL.
3. **PHP** : Version compatible avec les scripts utilisés (au minimum PHP 7.4 recommandé).
4. **Git** : Pour cloner le dépôt.

## Installation

### Étape 1 : Cloner le projet

```bash
git clone https://github.com/Youcode-Classe-E-2024-2025/ElHamzaoui_ZIRARI-todo_OOP
cd ElHamzaoui_ZIRARI-todo_OOP
```

### Étape 2 : Configuration de l'environnement

1. **Serveur Apache et MySQL**  
   - Utilisez un logiciel comme XAMPP, WAMP, ou MAMP pour démarrer Apache et MySQL.  
   - Placez les fichiers du projet dans le répertoire `htdocs` (pour XAMPP) ou dans le répertoire équivalent de votre serveur local.

2. **Base de Données**  
   - Ouvrez phpMyAdmin (accessible via `http://localhost/phpmyadmin`).  
   - Créez une base de données avec le nom  : `todo_list`.  
   - Importez le fichier SQL contenant la structure et les données :
     - Si votre fichier SQL n'existe pas, créez-le et ajoutez-le au dépôt pour faciliter l'installation.

3. **Fichier de Configuration**  
   - Vérifiez le fichier `config.php` et mettez à jour les paramètres de connexion à la base de données si nécessaire :
     ```php
     $servername = "localhost";
     $username = "root"; // Nom d'utilisateur MySQL par défaut
     $password = "";     // Mot de passe par défaut (vide pour XAMPP)
     $dbname = "todo_list";
     ```

### Étape 3 : Exécution du projet

1. Lancez le serveur Apache et MySQL via votre environnement local (exemple : XAMPP).
2. Accédez à votre projet en ouvrant un navigateur et en allant à l'adresse suivante :
   ```
   http://localhost/index1.php
   ```

## Fonctionnalités

- **Formulaires dynamiques** : Gestion via PHP et JavaScript.
- **Interaction avec une base de données MySQL** : Stockage et récupération des données.
- **Style et animations** : Ajoutés avec CSS(Tailwind) et JavaScript.

## Structure du Projet
 ![Structure du projet](images/structure.png)
## Outils Utilisés

- **Serveur Web Apache** : Hébergement du projet localement.
- **MySQL** : Base de données pour stocker les informations.
- **PHP** : Traitement côté serveur.
- **HTML, CSS, JavaScript** : Frontend du projet.