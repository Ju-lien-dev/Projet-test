<?php include_once __DIR__ . '/partialsAdmin/header.php'; ?>
<?php include_once __DIR__ . '/partialsAdmin/navBarActu.php'; ?>
<link rel="stylesheet" href="/accueil/style/header.css">
<link rel="stylesheet" href="/accueil/style/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/m9bc9wcsl99glc0dz88tjkdxs6mgqi7ki9zvelirtm96qehu/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>



<h1>Nouvelle actualité</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="container my-5">
        <div class=" mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="titre" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Votre message</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="Votre message" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image">Image : </label>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>