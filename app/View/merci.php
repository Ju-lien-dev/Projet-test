<?php

if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 0) {
    include_once __DIR__ . '/../View/clientConnected/partialsClient/header.php';
} else {
    include_once __DIR__ . '/../View/partials/header.php';
}
?>
<link rel="stylesheet" href="/accueil/style/merci.css">


<?php
// Amélioration du format date et heure
$date = DateTime::createFromFormat('Y-m-d', $appointment['date']);
$formattedDate = $date ? $date->format('d/m/Y') : $appointment['date'];

$time = DateTime::createFromFormat('H:i:s', $appointment['time']);
$formattedTime = $time ? $time->format('H:i') : $appointment['time'];
?>

<div class="confirmation-card">
    <h2>Merci pour votre réservation !</h2>
    <p><strong>Nom :</strong> <?= htmlspecialchars($appointment['nom']) ?></p>
    <p><strong>Téléphone :</strong> <?= isset($appointment['tel']) ? htmlspecialchars($appointment['tel']) : 'Non renseigné' ?>
    </p>
    <p><strong>Date :</strong> <?= $formattedDate ?></p>
    <p><strong>Heure :</strong> <?= $formattedTime ?></p>
</div>

<script>
    localStorage.removeItem('pendingRdv');
</script>