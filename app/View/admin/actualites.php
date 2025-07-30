<?php include_once __DIR__ . '/partialsAdmin/header.php'; ?>
<?php include_once __DIR__ . '/partialsAdmin/navBarActu.php'; ?>

<link rel="stylesheet" href="../style/header.css">
<link rel="stylesheet" href="../style/style.css">
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
                        <img src="<?= !empty($article['image']) ? "/uploads/" . htmlspecialchars($article['image']) : "/assets/dentist.jpg" ?>"
                            alt="<?= htmlspecialchars($article['title']) ?>"
                            class="img-fluid rounded"
                            style="max-height: 200px; object-fit: cover; width: 100%;">
                    </div>

                    <!-- Titre & contenu -->
                    <h5 class="mb-2"><?= htmlspecialchars($article['title']) ?></h5>
                    <p><?= nl2br(htmlspecialchars($article['content'])) ?></p>

                    <!-- Actions -->
                    <div class="btn-group mt-3">
                        <a href="edit-actu/<?= $article['id'] ?>" class="btn btn-outline-primary btn-sm">
                            <i class="fa fa-pencil"></i> Modifier
                        </a>
                        <button type="button"
                            class="btn btn-outline-danger btn-sm delete-btn"
                            data-id="<?= $article['id'] ?>">
                            <i class="fa fa-trash"></i> Supprimer
                        </button>
                    </div>
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


<script src="/js/actualites.js"></script>