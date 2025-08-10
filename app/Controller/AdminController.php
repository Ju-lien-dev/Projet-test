<?php

namespace App\Controller;

use App\Model\Article;
use App\Model\Appointment;
use App\Model\Customer;
use PDO;

class AdminController
{
    private $article;
    private $appointment;
    private $customer;

    public function __construct()
    {
        global $pdo;
        $this->article = new Article($pdo);
        $this->appointment = new Appointment($pdo);
        $this->customer = new Customer($pdo);
    }


    public function admin()
    {
        include_once __DIR__ . '/../View/admin/admin.php';
    }

    public function rdv()
    {
        self::requireAdmin();
        include_once __DIR__ . '/../View/admin/rdv.php';
    }


    public function services()
    {
        self::requireAdmin();
        include_once __DIR__ . '/../View/admin/services.php';
    }

    public function actualites()
    {
        self::requireAdmin();
        $articles = $this->article->getAll();
        include_once __DIR__ . '/../View/admin/actualites.php';
    }
    public function horaires()
    {
        self::requireAdmin();
        include_once __DIR__ . '/../View/admin/horaires.php';
    }

    public function modifRdv()
    {
        self::requireAdmin();
        include_once __DIR__ . '/../View/admin/modifRdv.php';
    }
    public function createActu()
    {
        self::requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $this->uploadImage();
            $this->article->create($title, $content, $image);
            header('Location: /accueil/admin/actualites');
        } else {
            include_once __DIR__ . '/../View/admin/createActu.php';
        }
    }
    public function editActu($id)
    {
        self::requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $this->article->update($id, $title, $content);
            header('Location: /accueil/admin/actualites');
        } else {

            $article = $this->article->getById($id);
            include_once __DIR__ . '/../View/admin/editActu.php';
        }
    }

    public function viewActus()
    {
        self::requireAdmin();
        include_once __DIR__ . '/../View/admin/viewActus.php';
    }

    public function deleteActu($id)
    {
        self::requireAdmin();
        $this->article->delete($id);
        header('Location: /accueil/admin/actualites');
        exit;
    }

    private function uploadImage()
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir =  __DIR__ . '/../../public/uploads/';
            $fileName = basename($_FILES['image']['name']);
            $uploadFile = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                return $fileName;
            }
        }
        return null;
    }

    public static function  requireAdmin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] !== 1) {
            header('Location: /accueil/login');
            exit;
        }
    }

    public function deleteAppointment($token)
    {
        self::requireAdmin();
        $this->appointment->delete($token);
        header('Location: /accueil/admin/rdv');
        exit;
    }

    public function seePatients()
    {
        $userModel = new \App\Model\User($GLOBALS['pdo']);
        $search = $_GET['search'] ?? null;
        $patients = $userModel->getAllPatients($search);

        include_once __DIR__ . '/../View/admin/patients.php';
    }
}
