<?php include_once __DIR__ . '/partialsAdmin/navBarRdv.php'; ?>
<link rel="stylesheet" href="../style/newAppointment.css">

<!-- Fonts & Styles -->
<link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

<!-- Section avec fond -->
<div class="bg-full d-flex align-items-center justify-content-center" style="min-height: 100vh; background-image: url('https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/form-banners/banner2/banner-bg.jpg'); background-size: cover; background-position: center;">
    <form method="post" class="w-100" style="max-width: 500px;">
        <div class="card shadow-lg p-4 rounded bg-white">
            <h3 class="text-center mb-4">Ajouter une disponibilité</h3>

            <div class="form-group">
                <label for="date">Date de rendez-vous</label>
                <input name="date" type="date" id="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="time">Heure de rendez-vous</label>
                <input name="time" type="time" id="time" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-danger btn-block mt-3">
                Ajouter maintenant
            </button>
        </div>
    </form>
</div>

<!-- JS -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<script>
    document.querySelector("form").addEventListener("submit", function(e) {
        alert("Votre nouvelle disponibilité a bien été ajoutée !");
    });
</script>