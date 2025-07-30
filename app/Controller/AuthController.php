<?php

namespace App\Controller;

use App\Model\User;
use PDO;

class AuthController


{

    private $user;

    public function __construct()
    {
        global $pdo;
        $this->user = new User($pdo);
    }

    public function register()
    {
        $errors = [];
        $old = ['email' => ''];
        $confirmPassword = $_POST['confirm_password'] ?? '';



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');
            $prenom = trim($_POST['prenom'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $old['email'] = htmlspecialchars($email, ENT_QUOTES);

            if (empty($nom)) {
                $errors['nom'] = "Le nom est obligatoire.";
            }

            if (empty($prenom)) {
                $errors['prenom'] = "Le nom est obligatoire.";
            }

            if ($this->user->exists($email)) {
                $errors[] = "Cet email est déjà utilisé.";
            }

            if (
                strlen($password) < 8
                || !preg_match('/[A-Za-z]/', $password)
                || !preg_match('/[\d]/', $password)
            ) {
                $errors[] = "Le mot de passe doit contenir au moins 8 caractères et contenir au moins une lettre.";
            }
            if (empty($_POST['email'])) {
                $errors['email'] = "L'email est obligatoire.";
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "L'email est invalide.";
            }

            if (empty($_POST['password'])) {
                $errors['password'] = "Le mot de passe est obligatoire.";
            }
            if ($password !== $confirmPassword) {
                $errors[] = "Les mots de passe ne correspondent pas.";
            }
            if (empty($errors)) {
                $this->user->create($nom, $prenom, $email, $password);
                header('Location: /mon-compte');
                exit;
            }
        }
        include_once __DIR__ . '/../View/register.php';
    }


    public function login()
    {
        session_start();
        $error = [];
        $old   = ['email' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = trim($_POST['email']);
            $password = $_POST['password'];
            $old['email'] = htmlspecialchars($email, ENT_QUOTES);

            $user = $this->user->login($email, $password);
            if ($user) {
                if ($user['is_admin'] != 1) {
                    $_SESSION['user'] = $user;
                    header('Location: /mon-rdv');
                    exit;
                } else {
                    $_SESSION['user'] = $user;
                    header('Location: /admin/rdv');
                    exit;
                }
            } else {
                $error[] = "Identifiants invalides.";
            }
        }

        include_once __DIR__ . '/../View/connection.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }
}
