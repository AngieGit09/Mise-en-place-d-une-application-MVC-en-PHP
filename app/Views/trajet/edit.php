<?php
/**
 * Formulaire d'édition d'un trajet existant
 * Variable disponible : $trajet (données du trajet à modifier)
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un trajet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Carte contenant le formulaire -->
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Modifier le trajet</h4>
                </div>

                <div class="card-body">
                    <!-- Formulaire POST envoyé vers /trajet/{id}/edit -->
                    <form method="post" action="/trajet/<?= $trajet['id'] ?>/edit">

                        <!-- Champ : Ville de départ -->
                        <div class="mb-3">
                            <label class="form-label">Agence de départ</label>
                            <input type="text"
                                   name="ville_depart"
                                   class="form-control"
                                   required
                                   value="<?= htmlspecialchars($trajet['ville_depart']) ?>">
                        </div>

                        <!-- Champ : Ville d'arrivée -->
                        <div class="mb-3">
                            <label class="form-label">Agence d'arrivée</label>
                            <input type="text"
                                   name="ville_arrivee"
                                   class="form-control"
                                   required
                                   value="<?= htmlspecialchars($trajet['ville_arrivee']) ?>">
                        </div>

                        <!-- Champ : Date et heure du trajet -->
                        <div class="mb-3">
                            <label class="form-label">Date du trajet</label>
                            <input type="datetime-local"
                                   name="date_trajet"
                                   class="form-control"
                                   required
                                   value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_trajet'])) ?>">
                        </div>

                        <!-- Champ : Nombre de places disponibles -->
                        <div class="mb-3">
                            <label class="form-label">Nombre de places</label>
                            <input type="number"
                                   name="places"
                                   class="form-control"
                                   min="1"
                                   required
                                   value="<?= (int)$trajet['places'] ?>">
                        </div>

                        <!-- Champ : Prix du trajet -->
                        <div class="mb-3">
                            <label class="form-label">Prix (€)</label>
                            <input type="number"
                                   name="prix"
                                   class="form-control"
                                   step="0.01"
                                   min="0"
                                   required
                                   value="<?= htmlspecialchars($trajet['prix']) ?>">
                        </div>

                        <!-- Boutons d'action -->
                        <div class="d-flex justify-content-between">
                            <a href="/" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>