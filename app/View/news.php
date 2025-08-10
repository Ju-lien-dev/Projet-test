<!DOCTYPE html>
<html lang="fr">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>actualites</title>
    <link rel="stylesheet" href="/accueil/style/index.css">
</head>


<?php include_once __DIR__ . '/../View/partials/header.php'; ?>
<link rel="stylesheet" href="/accueil/style/header.css">
<link rel="stylesheet" href="/accueil/style/style.css">
<link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">






<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<div class="container mt-5 containerCards">
    <div class="row">
        <?php foreach ($articles as $article): ?>
            <div class="col-md-6 mb-4">
                <div class="appointment-card">
                    <!-- Image -->
                    <div class="mb-3 text-center">
                        <img src="<?= !empty($article['image']) ? "/accueil/uploads/" . htmlspecialchars($article['image']) : "/accueil/assets/dentist.jpg" ?>"
                            alt="<?= htmlspecialchars($article['title']) ?>"
                            class="img-fluid rounded"
                            style="max-height: 200px; object-fit: cover; width: 100%;">
                    </div>

                    <!-- Titre & contenu -->
                    <h5 class="mb-2"><?= htmlspecialchars($article['title']) ?></h5>
                    <p><?= nl2br(htmlspecialchars($article['content'])) ?></p>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if (empty($articles)): ?>
            <div class="col-12">
                <p>Aucune actualité disponible pour le moment.</p>
            </div>
        <?php endif; ?>
    </div>
</div>