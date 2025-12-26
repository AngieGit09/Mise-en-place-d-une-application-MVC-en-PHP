<?php
/**
 * Page d'accueil affichant la liste des trajets disponibles
 * Variables disponibles :
 * - $user : utilisateur connecté (ou null)
 * - $trajets : tableau des trajets disponibles
 */

// Variable par défaut si non définie
$user = $user ?? null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trajets proposés - Touche pas au klaxon</title>

    <!-- Bootstrap CSS pour le design -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-light">

<!-- ========== BARRE DE NAVIGATION ========== -->
<nav class="navbar bg-white border rounded-pill mx-3 mt-3 px-4 shadow-sm">
    <div class="container-fluid">
        <!-- Logo/Titre de l'application -->
        <span class="navbar-brand fw-bold">Touche pas au klaxon</span>

        <!-- Menu utilisateur (connexion ou profil) -->
        <div class="d-flex align-items-center gap-2">
            <?php if ($user): ?>
                <!-- Si l'utilisateur est connecté -->
                <a href="/trajet/create" class="btn btn-primary">Créer un trajet</a>
                <span>Bonjour <?= htmlspecialchars($user['prenom'] . ' ' . $user['nom']) ?></span>
                <a href="/logout" class="btn btn-dark">Déconnexion</a>
            <?php else: ?>
                <!-- Si l'utilisateur n'est pas connecté -->
                <a href="/login" class="btn btn-primary">Connexion</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- ========== CONTENU PRINCIPAL ========== -->
<div class="container mt-4">
    <h2 class="mb-3">Trajets proposés</h2>

    <!-- Tableau des trajets disponibles -->
    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
        <tr>
            <th>Départ</th>
            <th>Date de départ</th>
            <th>Destination</th>
            <th>Date d'arrivée</th>
            <th>Places disponibles</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php if (!empty($trajets)): ?>
            <!-- Boucle sur chaque trajet disponible -->
            <?php foreach ($trajets as $trajet): ?>
                <tr>
                    <!-- Informations du trajet -->
                    <td><?= htmlspecialchars($trajet['ville_depart']) ?></td>
                    <td><?= date('d/m/Y', strtotime($trajet['date_trajet'])) ?></td>
                    <td><?= htmlspecialchars($trajet['ville_arrivee']) ?></td>
                    <td><?= date('d/m/Y', strtotime($trajet['date_arrivee'] ?? $trajet['date_trajet'])) ?></td>
                    <td><?= (int)$trajet['places'] ?></td>
                    
                    <!-- Boutons d'action -->
                    <td>
                        <?php if ($user): ?>
                            <!-- Bouton pour afficher les détails dans une modale -->
                            <button class="btn btn-sm btn-outline-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal<?= $trajet['id'] ?>"
                                    title="Voir les détails">
                                👁
                            </button>

                            <!-- Si l'utilisateur est le créateur du trajet, afficher les boutons modifier/supprimer -->
                            <?php if ($user['id'] == $trajet['employe_id']): ?>
                                <a href="/trajet/<?= $trajet['id'] ?>/edit" 
                                   class="btn btn-sm btn-outline-secondary"
                                   title="Modifier">
                                    ✏️
                                </a>
                                <a href="/trajet/<?= $trajet['id'] ?>/delete"
                                   class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?')"
                                   title="Supprimer">
                                    🗑
                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <!-- Message si l'utilisateur n'est pas connecté -->
                            <span class="text-muted">Connexion requise</span>
                        <?php endif; ?>
                    </td>
                </tr>

                <!-- ========== MODALE : DÉTAILS DU TRAJET ========== -->
                <?php if ($user): ?>
                <div class="modal fade" id="modal<?= $trajet['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Informations du trajet</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                            </div>
                            <div class="modal-body text-start">
                                <!-- Informations du conducteur -->
                                <p><strong>Conducteur :</strong> <?= htmlspecialchars($trajet['prenom'] . ' ' . $trajet['nom']) ?></p>
                                <p><strong>Téléphone :</strong> <?= htmlspecialchars($trajet['telephone']) ?></p>
                                <p><strong>Email :</strong> <?= htmlspecialchars($trajet['email']) ?></p>
                                <p><strong>Places totales :</strong> <?= (int)$trajet['places_total'] ?></p>
                                <p><strong>Prix :</strong> <?= htmlspecialchars($trajet['prix']) ?> €</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            <?php endforeach; ?>
        <?php else: ?>
            <!-- Message si aucun trajet n'est disponible -->
            <tr>
                <td colspan="6" class="text-muted">Aucun trajet disponible</td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>
</div>

<!-- ========== PIED DE PAGE ========== -->
<footer class="text-center text-muted mb-3 mt-5">
    © 2024 - CENEF - MVC PHP
</footer>

<!-- Bootstrap JavaScript pour les composants interactifs (modales, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>