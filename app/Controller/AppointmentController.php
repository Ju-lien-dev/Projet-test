<?php

namespace App\Controller;

use App\Model\appointment;
use App\Model\User;
use PDO;

class AppointmentController
{
    private $appointment;
    private $users;

    public function __construct()
    {
        global $pdo;
        $this->appointment = new appointment($pdo);
        $this->users = new User($pdo);
    }

    public function appointment()
    {
        $dateFilter = $_GET['date'] ?? null;
        if ($dateFilter) {
            $appointments = $this->users->getAppointmentsByDate($dateFilter);
        } else {
            $appointments = $this->appointment->getAll();
        }
        include_once __DIR__ . '/../View/admin/rdv.php';
    }

    public function newSchedule()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['date'];
            $time = $_POST['time'];

            $this->appointment->createDispo($date, $time);
            header('Location: /admin/disponibilitees');
        } else {
            include_once __DIR__ . '/../View/admin/newDispo.php';
        }
    }

    public function reserver()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['date'] ?? null;
            $time = $_POST['time'] ?? null;



            // Si l'utilisateur est connecté
            if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 0) {
                $userId = $_SESSION['user']['id'];

                try {
                    $token = $this->users->createAppointmentForConnectedUser($userId, $date, $time);
                    header('Location: /mon-compte/merci/' . $token);
                    exit;
                } catch (\Exception $e) {
                    // Gérer erreur (créneau déjà pris, etc.)
                    header('Location: /nouveau-rdv?error=1');
                    exit;
                }
            } else {
                // Utilisateur invité
                $nom = $_POST['nom'] ?? null;
                $prenom = $_POST['prenom'] ?? null;
                $tel = $_POST['tel'] ?? null;

                if ($nom && $prenom && $tel) {
                    $token = $this->users->createNoAccountUser($nom, $prenom, $tel, $date, $time);
                    $this->users->deleteDispo($date, $time);

                    header('Location: /merci/' . $token);
                    exit;
                } else {
                    header('Location: /nouveau-rdv');
                    exit;
                }
            }
        }
    }


    public function seeDispo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? null;
            $prenom = $_POST['prenom'] ?? null;
            $tel = $_POST['tel'] ?? null;
            $date = $_POST['date'] ?? null;
            $time = $_POST['time'] ?? null;


            if ($nom && $prenom && $tel && $date && $time) {
                $this->users->createNoAccountUser($nom, $prenom, $tel, $date, $time);
            } else {
                header('Location: /nouveau-rdv');
                exit;
            }

            header('Location: /');
            exit;
        } else {
            $appointments = $this->appointment->seeDispo();
            include_once __DIR__ . '/../View/newAppointment.php';
        }
    }


    public function rdv()
    {
        $dateFilter = $_GET['date'] ?? null;

        if ($dateFilter) {
            $appointments = $this->users->getAppointmentsByDate($dateFilter);
        } else {
            $appointments = $this->users->appointmentReserved();
        }

        include_once __DIR__ . '/../View/admin/rdv.php';
    }

    public function merci($token = null)
    {
        if (!$token) {
            die('Erreur : Token manquant pour le rendez-vous.');
        }

        $appointment = $this->users->seeApointment($token);

        // Vérifier si le rendez-vous existe

        if (!$appointment) {
            die('Erreur : Aucun rendez-vous trouvé.');
        }

        include_once __DIR__ . '/../View/merci.php';
    }

    public function monRdvConnected()
    {
        include_once __DIR__ . '/../View/clientConnected/monRdv.php';
    }
}
