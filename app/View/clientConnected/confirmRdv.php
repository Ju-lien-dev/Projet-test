<?php include_once __DIR__ . '/partialsClient/header.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Confirmation du rendez-vous</title>
    <link rel="stylesheet" href="/accueil/style/newAppointClient.css">
    <style>
        .rdv-box {
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .rdv-box h2 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="rdv-box text-center">
        <h2>Votre rendez-vous sélectionné</h2>
        <p><strong>Date :</strong> <span id="rdv-date">...</span></p>
        <p><strong>Heure :</strong> <span id="rdv-time">...</span></p>

        <form method="post" action="/accueil/mon-compte/valider-rdv" id="confirmForm">
            <input type="hidden" name="date" id="form-date">
            <input type="hidden" name="time" id="form-time">
            <button type="submit" class="btn btn-primary mt-4">Valider le créneau</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rdvData = localStorage.getItem('pendingRdv');

            if (rdvData) {
                const rdv = JSON.parse(rdvData);
                document.getElementById('rdv-date').textContent = rdv.date || 'non spécifiée';
                document.getElementById('rdv-time').textContent = rdv.time || 'non spécifiée';

                // Injecter dans le formulaire
                document.getElementById('form-date').value = rdv.date;
                document.getElementById('form-time').value = rdv.time;
            } else {
                document.querySelector('.rdv-box').innerHTML = `
                    <h2>Aucun rendez-vous sélectionné</h2>
                    <a href="/accueil/nouveau-rdv" class="btn btn-primary mt-4">Prendre un rendez-vous</a>
                `;
            }
        });
    </script>

</body>

</html>