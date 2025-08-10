<?php

if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 0) {
    include_once __DIR__ . '/../View/clientConnected/partialsClient/header.php';
} else {
    include_once __DIR__ . '/../View/partials/header.php';
}
?>

<link rel="stylesheet" href="/accueil/style/newAppointClient.css">
<link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<?php
// Protection pour éviter les erreurs si $appointments n'est pas défini
if (!isset($appointments) || !is_array($appointments)) {
    $appointments = [];
}

$appointments = array_filter($appointments, function ($a) {
    return strtotime($a['date'] . ' ' . $a['time']) >= time();
});

usort($appointments, function ($a, $b) {
    return strtotime($a['date'] . ' ' . $b['time']) - strtotime($b['date'] . ' ' . $a['time']);
});

$months = [
    '01' => 'janvier',
    '02' => 'février',
    '03' => 'mars',
    '04' => 'avril',
    '05' => 'mai',
    '06' => 'juin',
    '07' => 'juillet',
    '08' => 'août',
    '09' => 'septembre',
    '10' => 'octobre',
    '11' => 'novembre',
    '12' => 'décembre'
];
?>

<div class="bg-full d-flex align-items-center">
    <div class="container">
        <h2 class="text-center text-white mb-5">Choisissez un créneau de rendez-vous</h2>

        <div class="row">
            <?php foreach ($appointments as $appointment): ?>
                <?php
                $dateParts = explode('-', $appointment['date']);
                $formattedDate = intval($dateParts[2]) . ' ' . $months[$dateParts[1]] . ' ' . $dateParts[0];
                $formattedTime = date('H:i', strtotime($appointment['time']));
                ?>
                <div class="col-md-6 col-lg-4">
                    <form method="post" action="/accueil/reserver" class="appointment-form">
                        <div class="cardbox shadow-lg bg-white">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-2"><?php echo $formattedDate; ?></h5>
                                <p class="card-text"><strong>Heure :</strong> <?php echo $formattedTime; ?></p>

                                <input type="hidden" name="date" value="<?php echo htmlspecialchars($appointment['date']); ?>">
                                <input type="hidden" name="time" value="<?php echo htmlspecialchars($appointment['time']); ?>">

                                <button type="submit" class="btn btn-danger btn-block">Réservez maintenant</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal invité Bootstrap -->
<div class="modal fade" id="guestReservationModal" tabindex="-1" role="dialog" aria-labelledby="guestReservationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-0">
                <h5 class="modal-title mx-auto" id="guestReservationModalLabel">Finalisez votre réservation</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p class="text-center mb-4">Vous pouvez :</p>

                <div class="d-flex flex-column">
                    <button type="button" class="btn btn-outline-light btn-block mb-3" id="loginBtn">Se connecter</button>


                    <form id="guestReservationForm" method="post">

                        <div class="form-group">
                            <label for="guestName">Nom</label>
                            <input type="text" class="form-control" id="guestName" name="nom" required>
                        </div>

                        <div class="form-group">
                            <label for="surName">prenom</label>
                            <input type="text" class="form-control" id="surName" name="prenom" required>
                        </div>

                        <div class="form-group">
                            <label for="guestPhone">Téléphone</label>
                            <input type="tel" class="form-control" id="guestPhone" name="tel" required pattern="[0-9]{10}" placeholder="0601020304">
                        </div>

                        <button type="submit" class="btn btn-danger btn-block">Continuer sans compte</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script>
    const isLoggedIn = <?= isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 0 ? 'true' : 'false' ?>;

    document.querySelectorAll(".appointment-form").forEach(function(form) {
        form.addEventListener("submit", function(e) {
            e.preventDefault();

            const date = form.querySelector('input[name="date"]').value;
            const time = form.querySelector('input[name="time"]').value;

            localStorage.setItem('pendingRdv', JSON.stringify({
                date,
                time
            }));

            if (isLoggedIn) {
                // Redirection directe vers la confirmation pour utilisateur connecté
                window.location.href = "/accueil/mon-compte/confirmer-rdv";
            } else {
                // Utilisateur non connecté : afficher modale
                window.formToSubmit = form;
                $('#guestReservationModal').modal('show');
            }
        });
    });


    document.getElementById("guestReservationForm").addEventListener("submit", function(e) {
        e.preventDefault();

        const name = document.getElementById("guestName").value.trim();
        const surname = document.getElementById("surName").value.trim();
        const phone = document.getElementById("guestPhone").value.trim();

        if (!name || !phone.match(/^\d{10}$/)) {
            alert("Veuillez remplir correctement le nom et un numéro de téléphone valide (10 chiffres).");
            return;
        }

        // Crée les champs cachés pour transmettre les infos invité dans le formulaire initial
        const inputName = document.createElement("input");
        inputName.type = "hidden";
        inputName.name = "nom";
        inputName.value = name;

        const inputSurname = document.createElement("input");
        inputSurname.type = "hidden";
        inputSurname.name = "prenom";
        inputSurname.value = surname;

        const inputPhone = document.createElement("input");
        inputPhone.type = "hidden";
        inputPhone.name = "tel";
        inputPhone.value = phone;

        window.formToSubmit.appendChild(inputName);
        window.formToSubmit.appendChild(inputSurname);
        window.formToSubmit.appendChild(inputPhone);

        $('#guestReservationModal').modal('hide');
        window.formToSubmit.submit();
    });

    document.getElementById('loginBtn').addEventListener('click', function() {
        if (!window.formToSubmit) {
            alert("Veuillez d'abord choisir un créneau.");
            return;
        }

        const form = window.formToSubmit;
        const date = form.querySelector('input[name="date"]').value;
        const time = form.querySelector('input[name="time"]').value;

        localStorage.setItem('pendingRdv', JSON.stringify({
            date,
            time
        }));



        window.location.href = "/accueil/login";
    });
</script>