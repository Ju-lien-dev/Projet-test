<?php

namespace App\Controller;

use App\Model\ClientModel;
use PDO;

class ClientController
{
    private $client;

    public function __construct()
    {
        global $pdo;
        $this->client = new ClientModel($pdo);
    }

    public function monCompte()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $userId = $_SESSION['user']['id'];
        $infos = $this->client->getInfoClient($userId);
        $appointmentModel = new \App\Model\Appointment($GLOBALS['pdo']);
        $rdvs = $appointmentModel->getAppointmentsByUserId($userId);

        include_once __DIR__ . '/../View/clientConnected/monCompte.php';
    }
    public static function  requireClient()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin']) {
            header('Location: /accueil/login');
            exit;
        }
    }

    public function modifierMesInfos()
    {
        self::requireClient();

        $userId = $_SESSION['user']['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $this->client->updateClient($userId, $nom, $prenom, $email, $tel);
            header('Location: /accueil/mon-compte');
        } else {

            $infos = $this->client->getInfoClient($userId);
            include_once __DIR__ . '/../View/clientConnected/mesInfos.php';
        }
    }
    public function confirmRdv()
    {
        include_once __DIR__ . '/../View/clientConnected/confirmRdv.php';
    }
    public function prendreRdv()
    {

        $appointmentModel = new \App\Model\Appointment($GLOBALS['pdo']);
        $appointments = $appointmentModel->seeDispo();
        include_once __DIR__ . '/../View/newAppointment.php';
    }
}
