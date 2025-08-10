<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon compte</title>
    <link rel="stylesheet" href="/accueil/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-section {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-section h4 {
            margin-bottom: 20px;
        }

        .btn-save {
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include_once __DIR__ . '/partialsClient/header.php'; ?>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="form-section">
                    <h4 class="text-center text-primary">Mes informations personnelles</h4>

                    <?php if ($infos): ?>
                        <form method="post" action="/accueil/mon-compte/mes-infos">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($infos['nom']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom :</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($infos['prenom']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($infos['email']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="tel">Téléphone :</label>
                                <input type="tel" class="form-control" id="tel" name="tel" value="<?= isset($infos['tel']) ? htmlspecialchars($infos['tel']) : '' ?>" placeholder="Ex : 0601020304">
                            </div>

                            <button type="submit" class="btn btn-success btn-save">Enregistrer les modifications</button>
                        </form>
                    <?php else: ?>
                        <div class="alert alert-danger text-center">Impossible de récupérer vos informations.</div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>