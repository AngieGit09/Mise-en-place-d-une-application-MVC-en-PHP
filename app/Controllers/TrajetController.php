<?php

class TrajetController
{
    /**
     * Page d'accueil : liste des trajets disponibles
     */
    public function index()
    {
        session_start();

        $user = $_SESSION['user'] ?? null;
        $trajets = Trajet::getDisponibles();

        require __DIR__ . '/../Views/home.php';
    }

    /**
     * Affiche le formulaire de création d'un trajet
     */
    public function createForm()
    {
        session_start();

        // Sécurité : utilisateur connecté
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        // Affichage du formulaire
        require __DIR__ . '/../Views/trajet/create.php';
    }

    /**
     * Traitement du formulaire de création
     */
    public function create()
    {
        session_start();

        // Sécurité : utilisateur connecté
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        // Sécurité minimale : champs obligatoires
        if (
            empty($_POST['ville_depart']) ||
            empty($_POST['ville_arrivee']) ||
            empty($_POST['date_trajet']) ||
            empty($_POST['places']) ||
            empty($_POST['prix'])
        ) {
            header('Location: /trajet/create?error=1');
            exit;
        }

        // Données alignées avec la table trajets
        $data = [
            'ville_depart'  => trim($_POST['ville_depart']),
            'ville_arrivee' => trim($_POST['ville_arrivee']),
            'date_trajet'   => $_POST['date_trajet'],
            'places'        => (int)$_POST['places'],
            'prix'          => (float)$_POST['prix'],
            'agence_id'     => null, // Mettre 1 si votre colonne est NOT NULL
            'employe_id'    => $_SESSION['user']['id'],
        ];

        // Insertion en base
        Trajet::create($data);

        // Redirection après succès
        header('Location: /?success=1');
        exit;
    }

    /**
     * Suppression d'un trajet
     */
    public function delete($id)
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $trajet = Trajet::find($id);

        // Sécurité : le trajet existe et appartient à l'utilisateur
        if (!$trajet || $trajet['employe_id'] != $_SESSION['user']['id']) {
            header('Location: /');
            exit;
        }

        Trajet::delete($id);

        header('Location: /?deleted=1');
        exit;
    }
}