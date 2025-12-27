<?php

class TrajetController
{
    public function index()
    {
        $user = $_SESSION['user'] ?? null;
        $trajets = Trajet::getDisponibles();
        require __DIR__ . '/../Views/home.php';
    }

    public function createForm()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        require __DIR__ . '/../Views/trajet/create.php';
    }

    public function create()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

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

        $data = [
            'ville_depart'  => trim($_POST['ville_depart']),
            'ville_arrivee' => trim($_POST['ville_arrivee']),
            'date_trajet'   => $_POST['date_trajet'],
            'places'        => (int)$_POST['places'],
            'prix'          => (float)$_POST['prix'],
            'agence_id'     => null,
            'employe_id'    => $_SESSION['user']['id'],
        ];

        Trajet::create($data);
        header('Location: /?success=1');
        exit;
    }

    public function editForm($id)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $trajet = Trajet::find($id);
        
        if (!$trajet) {
            header('Location: /');
            exit;
        }

        if ($trajet['employe_id'] != $_SESSION['user']['id']) {
            header('Location: /');
            exit;
        }

        require __DIR__ . '/../Views/trajet/edit.php';
    }

    public function update($id)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $trajet = Trajet::find($id);
        
        if (!$trajet || $trajet['employe_id'] != $_SESSION['user']['id']) {
            header('Location: /');
            exit;
        }

        if (
            empty($_POST['ville_depart']) ||
            empty($_POST['ville_arrivee']) ||
            empty($_POST['date_trajet']) ||
            empty($_POST['places']) ||
            empty($_POST['prix'])
        ) {
            header('Location: /trajet/' . $id . '/edit?error=1');
            exit;
        }

        $data = [
            'ville_depart' => trim($_POST['ville_depart']),
            'ville_arrivee' => trim($_POST['ville_arrivee']),
            'date_trajet' => $_POST['date_trajet'],
            'places' => (int)$_POST['places'],
            'prix' => (float)$_POST['prix']
        ];

        if (Trajet::update($id, $data)) {
            header('Location: /?success=1');
        } else {
            header('Location: /trajet/' . $id . '/edit?error=1');
        }
        exit;
    }

    public function delete($id)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $trajet = Trajet::find($id);
        
        if (!$trajet || $trajet['employe_id'] != $_SESSION['user']['id']) {
            header('Location: /');
            exit;
        }

        Trajet::delete($id);
        header('Location: /?deleted=1');
        exit;
    }
}