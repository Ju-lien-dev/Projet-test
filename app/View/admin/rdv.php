<?php include_once __DIR__ . '/partialsAdmin/header.php'; ?>
<?php include_once __DIR__ . '/partialsAdmin/navBarRdv.php'; ?>
<link rel="stylesheet" href="../style/header.css">
<link rel="stylesheet" href="../style/style.css">
<link href="https://fonts.googleapis.com/css?family=Rokkitt&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">



<div class="container-fluid mt-4">
    <div class="row">

        <!-- Sidebar pour le filtre -->
        <div class="col-md-3">
            <div class="sidebar">
                <h4>Filtrer les RDV</h4>
                <form method="get">
                    <div class="form-group">
                        <label for="date">Date :</label>
                        <input type="date" name="date" id="date" value="<?= htmlspecialchars($_GET['date'] ?? '') ?>" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Filtrer</button>
                    <a href="/admin/rdv" class="btn btn-secondary btn-block mt-2">Réinitialiser</a>
                </form>
            </div>
        </div>

        <!-- Liste des rendez-vous -->
        <div class="col-md-9">
            <h3 class="mb-4">Liste des Rendez-vous</h3>

            <div class="appointments">
                <?php foreach ($appointments as $appointment): ?>
                    <div class="appointment-card">

                        <h5><?= htmlspecialchars($appointment['nom']); ?></h5>

                        <div class="appointment-info">
                            <i class="fa fa-calendar"></i>
                            <?= !empty($appointment['date']) ? date('d/m/Y', strtotime($appointment['date'])) : 'Date inconnue' ?>
                        </div>

                        <div class="appointment-info">
                            <i class="fa fa-clock-o"></i>
                            <?= !empty($appointment['time']) ? date('H:i', strtotime($appointment['time'])) : 'Heure inconnue' ?>
                        </div>

                        <div class="appointment-info">
                            <i class="fa fa-phone"></i> <?= isset($appointment['tel']) ? htmlspecialchars($appointment['tel']) : 'Non renseigné' ?>
                        </div>

                        <div class="appointment-info">
                            <i class="fa fa-envelope"></i>
                            <?php if (!empty($appointment['email'])): ?>
                                <a href="mailto:<?= htmlspecialchars($appointment['email']) ?>">
                                    <?= htmlspecialchars($appointment['email']) ?>
                                </a>
                            <?php else: ?>
                                Non renseigné
                            <?php endif; ?>
                        </div>


                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-danger delete-btn" data-id="<?= htmlspecialchars($appointment['token']); ?>">
                                <i class="fa fa-trash"></i> Supprimer
                            </button>
                        </div>

                    </div>
                <?php endforeach; ?>

                <?php if (empty($appointments)): ?>
                    <p>Aucun rendez-vous trouvé pour cette date.</p>
                <?php endif; ?>
            </div>

        </div>

    </div>
    <div id="deleteModal" class="modal-overlay" style="display:none;">
        <div class="modal-content">
            <h5>Confirmer la suppression</h5>
            <p>Êtes-vous sûr de vouloir supprimer ce rendez-vous ? Cette action est irréversible.</p>
            <div class="center-buttons">
                <a id="confirmDelete" class="btn btn-danger">Oui, Supprimer</a>
                <button id="cancelDelete" class="btn btn-secondary">Annuler</button>
            </div>
        </div>
    </div>
</div>

<script src="/js/rdv.js"></script>