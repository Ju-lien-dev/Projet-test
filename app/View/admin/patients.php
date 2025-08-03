<?php include_once __DIR__ . '/partialsAdmin/header.php'; ?>
<link rel="stylesheet" href="../style/header.css">

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des patients</title>
    <link rel="stylesheet" href="/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <div class="container mt-5">
        <h2 class="mb-4 text-center">Liste des patients</h2>

        <form method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, prénom, email ou téléphone"
                    value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Rechercher</button>
                    <a href="/admin/patients" class="btn btn-secondary">Réinitialiser</a>
                </div>
            </div>
        </form>

        <?php if (!empty($patients)): ?>
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient): ?>
                        <tr>
                            <td><?= htmlspecialchars($patient['nom']) ?></td>
                            <td><?= htmlspecialchars($patient['prenom']) ?></td>
                            <td><?= htmlspecialchars($patient['email'] ?? 'Non renseigné') ?></td>
                            <td><?= htmlspecialchars($patient['tel'] ?? 'Non renseigné') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Aucun patient trouvé.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>