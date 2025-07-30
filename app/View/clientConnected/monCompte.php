<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon compte</title>
    <link rel="stylesheet" href="/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include_once __DIR__ . '/partialsClient/header.php'; ?>

    <div class="container mt-5">
        <div class="row">

            <!-- Colonne gauche : Infos client -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Mes informations</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($infos): ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Nom :</strong> <?= htmlspecialchars($infos['nom']) ?></li>
                                <li class="list-group-item"><strong>Prénom :</strong> <?= htmlspecialchars($infos['prenom']) ?></li>
                                <li class="list-group-item"><strong>Email :</strong> <?= htmlspecialchars($infos['email']) ?></li>
                                <li class="list-group-item"><strong>Téléphone :</strong> <?= isset($infos['tel']) ? htmlspecialchars($infos['tel']) : 'Non renseigné' ?></li>
                            </ul>
                        <?php else: ?>
                            <div class="alert alert-danger">Impossible de récupérer vos informations.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Colonne droite : Prochains rendez-vous -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white text-center">
                        <h4 class="mb-0">Mes prochains rendez-vous</h4>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($rdvs)): ?>
                            <ul class="list-group">
                                <?php foreach ($rdvs as $rdv): ?>
                                    <li class="list-group-item">
                                        <strong>Date :</strong> <?= htmlspecialchars(date('d/m/Y', strtotime($rdv['date']))) ?><br>
                                        <strong>Heure :</strong> <?= htmlspecialchars(substr($rdv['time'], 0, 5)) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>Aucun rendez-vous à venir.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>