<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Redirection...</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pendingRdv = localStorage.getItem('pendingRdv');
            if (pendingRdv) {
                window.location.href = "/mon-compte/confirmer-rdv";
            } else {
                window.location.href = "/mon-compte";
            }
        });
    </script>
</head>

<body>
    <p>Redirection en cours...</p>
</body>

</html>