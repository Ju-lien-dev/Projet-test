<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/config/database.php';

use App\Controller\HomeController;
use App\Controller\AdminController;
use App\Controller\AppointmentController;
use App\Controller\AuthController;

$scriptName = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
$requestUri = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

while (!empty($scriptName) && !empty($requestUri) && $scriptName[0] === $requestUri[0]) {
   array_shift($scriptName);
   array_shift($requestUri);
}

$uriSegments = $requestUri;



$controller = new HomeController();
$adminController = new AdminController();
$appointmentController = new AppointmentController();
$authController = new AuthController();

switch ($uriSegments[0]) {

   case '':
      $controller->index();
      break;

   case 'accueil':
      $controller->index();
      break;


   case 'rdv':
      // page to get appointment 
      $appointmentController->appointment();
      break;

   case 'nouveau-rdv':
      $appointmentController->seeDispo();
      break;

   case 'reserver':
      $appointmentController->reserver();
      break;

   case 'logout':
      $authController->logout();
      break;

   case 'mon-rdv':
      $appointmentController->monRdvConnected();
      break;






   case 'services':
      // page to get appointment 
      $controller->services();
      break;

   case 'a_propos':
      // page to get appointment 
      $controller->about();
      break;

   case 'actualites':
      // page to get appointment 
      $controller->news();
      break;

   case 'connection':
      $controller->connection();
      break;

   case 'register':
      $authController->register();
      break;

   case 'login':
      $authController->login();
      break;

   case 'enregistrement':
      $controller->enregistrement();
      break;

   case 'mentions-legales':
      $controller->mentionsLegales();
      break;

   case 'cgu':
      $controller->cgu();
      break;

   case 'politique-confidentialite':
      $controller->politiqueConfidentialite();
      break;

   case 'merci':
      $token = $uriSegments[1] ?? null;

      if (!$token) {
         die('Erreur : Token manquant dans l\'URL.');
      }

      $appointmentController->merci($token);
      break;

   case 'mon-compte':
      \App\Controller\ClientController::requireClient();
      $clientController = new \App\Controller\ClientController();

      if (isset($uriSegments[1])) {
         switch ($uriSegments[1]) {
            case 'confirmer-rdv':
               $clientController->confirmRdv();
               break;
            case 'valider-rdv':
               $appointmentController->reserver();
               break;

            case 'merci':
               $token = $uriSegments[2] ?? null;
               if (!$token) {
                  die('Erreur : Token manquant dans l\'URL.');
               }
               $appointmentController->merci($token);
               break;

            case 'nouveau-rdv':
               $clientController->prendreRdv();
               break;

            case 'mes-infos':
               $clientController->modifierMesInfos();
               break;

            default:
               $clientController->monCompte(); // fallback
               break;
         }
      } else {
         $clientController->monCompte();
      }
      break;


   case 'admin':
      $adminController->requireAdmin(); // protège tout le sous-espace /admin
      $adminController->admin();



      if (isset($uriSegments[1])) {
         switch ($uriSegments[1]) {
            case 'rdv':
               $appointmentController->rdv();
               break;
            case 'disponibilitees':
               $appointmentController->newSchedule();
               break;
            case 'services':
               $adminController->services();
               break;
            case 'patients':
               $adminController->seePatients();
               break;
            case 'horaires':
               $adminController->horaires();
               break;

            case 'actualites':
               $adminController->actualites();
               break;

            case 'create-actu':
               $adminController->createActu();
               break;
            case 'edit-actu':
               if (isset($uriSegments[2])) {
                  $adminController->editActu($uriSegments[2]);
               }

               break;

            case 'delete':
               if (isset($uriSegments[2])) {
                  $adminController->deleteActu($uriSegments[2]);
               }
               break;
            case 'delete-appointment':
               if (isset($uriSegments[2])) {
                  $adminController->deleteAppointment($uriSegments[2]);
               }
               break;

            case 'view-actus':
               $adminController->viewActus();
               break;
         }
      }
      break;
}
