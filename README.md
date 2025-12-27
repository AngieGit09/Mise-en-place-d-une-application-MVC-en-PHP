#  Application de Covoiturage - MVC PHP

Application web de covoiturage développée en PHP suivant l'architecture MVC (Modèle-Vue-Contrôleur).

##  Description

Cette application permet aux employés d'une entreprise de proposer et consulter des trajets de covoiturage entre différentes agences. Les utilisateurs connectés peuvent créer, modifier et supprimer leurs propres trajets.

##  Fonctionnalités

### Pour tous les utilisateurs
-  Consultation de la liste des trajets disponibles
-  Affichage des informations de base (départ, arrivée, date, places)

### Pour les utilisateurs connectés
-  Authentification (connexion/déconnexion)
-  Visualisation des détails du conducteur (nom, téléphone, email)
-  Création de nouveaux trajets
-  Modification de ses propres trajets
-  Suppression de ses propres trajets

##  Technologies utilisées

- **Langage** : PHP 8.x
- **Base de données** : MySQL / MariaDB
- **Gestion des dépendances** : Composer
- **Routeur** : Buki Router
- **Framework CSS** : Bootstrap 5
- **Serveur** : Serveur PHP intégré

##  Structure du projet
```
liard_angelique_application_mvd_en_php/
├── app/
│   ├── Controllers/          # Contrôleurs (logique métier)
│   │   ├── AuthController.php
│   │   └── TrajetController.php
│   ├── Models/               # Modèles (accès aux données)
│   │   ├── Agence.php
│   │   ├── Employe.php
│   │   └── Trajet.php
│   └── Views/                # Vues (interface utilisateur)
│       ├── home.php
│       ├── login.php
│       └── trajet/
│           ├── create.php
│           └── edit.php
├── config/
│   └── database.php          # Configuration BDD
├── public/
│   ├── css/
│   │   └── style.css
│   ├── index.php             # Point d'entrée
│   └── router.php
├── vendor/                   # Dépendances Composer
├── composer.json
└── README.md
```

##  Base de données

### Tables

**agences**
- `id` (PK)
- `ville`

**employes**
- `id` (PK)
- `nom`
- `prenom`
- `email`
- `telephone`
- `password`
- `role`

**trajets**
- `id` (PK)
- `ville_depart`
- `ville_arrivee`
- `date_trajet`
- `places`
- `prix`
- `agence_id` (FK)
- `employe_id` (FK)

##  Installation

### Prérequis

- PHP 8.x ou supérieur
- MySQL / MariaDB
- Composer
- Serveur local (XAMPP, WAMP, MAMP, etc.)

### Étapes

1. **Cloner le dépôt**
```bash
git clone https://github.com/AngieGit09/Mise-en-place-d-une-application-MVC-en-PHP.git
cd liard_angelique_application_mvd_en_php
```

2. **Installer les dépendances**
```bash
composer install
```

3. **Créer la base de données**
- Créer une base nommée `covoiturage`
- Importer le fichier `database.sql` (structure des tables)
- Importer le fichier `seed.sql` (données de test)

4. **Configurer la connexion à la base**

Modifier le fichier `config/database.php` si nécessaire :
```php
$host = 'localhost';
$db   = 'covoiturage';
$user = 'root';
$pass = '';
$port = 3306;
```

5. **Lancer le serveur**
```bash
php -S localhost:8000 -t public
```

6. **Accéder à l'application**

Ouvrir votre navigateur : `http://localhost:8000`

##  Comptes de test

**Utilisateur  :**
- Email : `alexandre.martin@email.fr`
- Mot de passe : `cef123`

**Administrateur :**
- Email : `camille.moreau@email.fr`
- Mot de passe : `cef123`

##  Sécurité

- Mots de passe hashés avec `password_hash()` (bcrypt)
- Protection contre les injections SQL (requêtes préparées PDO)
- Vérification des autorisations (seul l'auteur peut modifier/supprimer)
- Protection XSS avec `htmlspecialchars()`
- Gestion des sessions sécurisée

##  Utilisation

1. **Se connecter** avec un compte de test
2. **Consulter les trajets** disponibles sur la page d'accueil
3. **Créer un trajet** via le bouton "Créer un trajet"
4. **Voir les détails** en cliquant sur l'icône 👁️
5. **Modifier/Supprimer** vos propres trajets avec les icônes ✏️ et 🗑️

##  Contexte académique

Projet réalisé dans le cadre du **Titre professionnel Développeur web et web mobile** au **Centre Européen de Formation** (2025/2026).

**Objectif** : Mise en place d'une application MVC en PHP



