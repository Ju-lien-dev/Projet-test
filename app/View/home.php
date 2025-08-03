<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Accueil - Cabinet Docteur Dupont</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Open+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style/index.css">


</head>

<body>

    <?php include_once __DIR__ . '/../View/partials/header.php'; ?>

    <main>
        <section class="imgDr" aria-label="Présentation du docteur Dupont">
            <img src="assets/dentiste2.jpg" alt="Docteur Dupont souriant dans son cabinet" />
            <h2>La santé dentaire avant tout !</h2>
        </section>

        <section class="introduction" aria-label="Présentation des soins dentaires">
            <div class="presentation">
                <h2>Des soins de qualité pour tous !</h2>
                <p>Parce que votre sourire mérite le meilleur, notre équipe est à vos côtés à chaque étape.</p>
            </div>
            <div class="img">
                <img src="assets/dentist.jpg" alt="Assistante dentaire souriante" />
            </div>
        </section>
    </main>

    <?php include_once __DIR__ . '/../View/partials/footer.php'; ?>

</body>

</html>