<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un trajet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Créer un nouveau trajet</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">Erreur : tous les champs sont obligatoires</div>
    <?php endif; ?>

    <form method="post" action="/trajet/create" class="card p-4 shadow">

        <div class="mb-3">
            <label>Ville de départ</label>
            <input type="text" name="ville_depart" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Ville d'arrivée</label>
            <input type="text" name="ville_arrivee" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date du trajet</label>
            <input type="date" name="date_trajet" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nombre de places</label>
            <input type="number" name="places" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label>Prix (€)</label>
            <input type="number" name="prix" class="form-control" min="0" step="0.01" required>
        </div>

        <button class="btn btn-primary">Créer</button>
        <a href="/" class="btn btn-secondary">Annuler</a>

    </form>
</div>

</body>
</html>