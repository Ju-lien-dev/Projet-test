<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link rel="stylesheet" href="/style/newMemberForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</head>

<body class="connection-page">

    <?php include_once __DIR__ . '/../View/partials/header.php'; ?>

    <div class="container mt-5">

        <!-- Formulaire de Connexion -->
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header">
                <h4 class="mb-0">Se connecter</h4>
            </div>
            <div class="card-body">

                <form method="post" action="/login">
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input
                                type="email"
                                class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                name="email"
                                placeholder="Votre email"
                                value="<?= htmlspecialchars($old['email'] ?? '') ?>"
                                required>
                            <?php if (isset($errors['email'])): ?>
                                <div class="invalid-feedback">
                                    <?= htmlspecialchars($errors['email']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input
                                type="password"
                                class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                                name="password"
                                placeholder="Votre mot de passe"
                                required>
                            <?php if (isset($errors['password'])): ?>
                                <div class="invalid-feedback">
                                    <?= htmlspecialchars($errors['password']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary btn-block">Se connecter</button>

                    <div class="mt-3 text-center">
                        <a href="#" onclick="showSignup()">Créer un compte</a>
                    </div>
                </form>

            </div>
        </div>

        <!-- Formulaire d'inscription -->
        <div class="card mx-auto mt-4" style="max-width: 400px; display:none;" id="signupForm">
            <div class="card-header">
                <h4 class="mb-0">Inscription</h4>
            </div>
            <div class="card-body">

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post" action="/register">

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="nom" value="<?= $old['name'] ?? '' ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" class="form-control" name="prenom" value="<?= $old['prenom'] ?? '' ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $old['email'] ?? '' ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label>Confirmer le mot de passe</label>
                        <input type="password" class="form-control" name="confirm_password" required>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">S'enregistrer</button>

                    <div class="mt-3 text-center">
                        <a href="#" onclick="hideSignup()">Déjà inscrit ? Se connecter</a>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script>
        // Affichage du bon formulaire (connexion/inscription)
        function showSignup() {
            $('#signupForm').show();
            $('.card.mx-auto').not('#signupForm').hide();
        }

        function hideSignup() {
            $('#signupForm').hide();
            $('.card.mx-auto').not('#signupForm').show();
        }

        <?php if (!empty($errors)): ?>
            $(document).ready(function() {
                showSignup();
            });
        <?php endif; ?>
    </script>