<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>À propos de nous</title>
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
</head>

<body>

    <?php include_once __DIR__ . '/partials/header.php'; ?>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">À propos de notre cabinet</h3>
                    </div>
                    <div class="card-body">
                        <p class="lead">
                            Bienvenue sur notre site ! Nous sommes un cabinet médical engagé à offrir des soins de qualité à nos patients, dans un environnement accueillant et professionnel.
                        </p>
                        <hr>
                        <h5>Nos valeurs</h5>
                        <ul>
                            <li><strong>Écoute :</strong> Chaque patient est unique, et nous prenons le temps de vous comprendre.</li>
                            <li><strong>Confiance :</strong> Une relation basée sur la transparence et le respect.</li>
                            <li><strong>Accessibilité :</strong> Prise de rendez-vous simple et rapide, en ligne ou par téléphone.</li>
                        </ul>

                        <h5 class="mt-4">Notre équipe</h5>
                        <p>
                            Notre équipe se compose de professionnels expérimentés, passionnés par la santé et le bien-être de nos patients.
                        </p>

                        <h5 class="mt-4">Nous contacter</h5>
                        <p>
                            📍 12 rue des Lilas, 75000 Paris<br>
                            📞 01 23 45 67 89<br>
                            ✉️ contact@cabinetmedical.fr
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . '/partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>