<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>À propos - Cabinet du Dr. Dupont</title>
    <link rel="stylesheet" href="/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include_once __DIR__ . '/partials/header.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">À propos du Dr. Dupont</h1>

        <div class="row mb-5">
            <div class="col-md-4 text-center">
                <img src="/assets/dentiste.png" alt="Dr. Dupont" class="img-fluid rounded-circle shadow" style="max-width: 250px;">
            </div>
            <div class="col-md-8">
                <h3>Dr. Claire Dupont</h3>
                <p>
                    Le Dr. Claire Dupont est diplômée de la Faculté d’Odontologie de Paris avec plus de 15 ans d’expérience dans le domaine de la chirurgie dentaire et des soins esthétiques.
                </p>
                <p>
                    Elle s’est spécialisée en implantologie et suit régulièrement des formations pour rester à la pointe des dernières innovations médicales. Passionnée par son métier, elle accorde une attention particulière au bien-être de ses patients.
                </p>
                <p>
                    Elle est membre de l’Union Française pour la Santé Bucco-Dentaire (UFSBD) et de l’Association Française d’Implantologie.
                </p>
            </div>
        </div>

        <h2 class="mb-4 text-center">Notre équipe</h2>
        <div class="row text-center">

            <div class="col-md-4 mb-4">
                <img src="/assets/assistante.png" alt="Julie, assistante" class="img-fluid rounded-circle mb-2" style="width: 150px;">
                <h5>Julie Martin</h5>
                <p>Assistante dentaire</p>
            </div>

            <div class="col-md-4 mb-4">
                <img src="/assets/secretaire.png" alt="Camille, secrétaire" class="img-fluid rounded-circle mb-2" style="width: 150px;">
                <h5>Camille Lefèvre</h5>
                <p>Secrétaire médicale</p>
            </div>

            <div class="col-md-4 mb-4">
                <img src="/assets/hygieniste.png" alt="Thomas, hygiéniste" class="img-fluid rounded-circle mb-2" style="width: 150px;">
                <h5>Thomas Girard</h5>
                <p>Hygiéniste dentaire</p>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>