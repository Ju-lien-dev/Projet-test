<?php

namespace App\Model;

use PDO;

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(string $nom, string $prenom, string $email, string $password): bool
    {
        $stmt = $this->pdo->prepare('
        INSERT INTO users (nom, prenom, email, password, type)
        VALUES (?, ?, ?, ?, ?)
    ');

        return $stmt->execute([
            $nom,
            $prenom,
            $email,
            password_hash($password, PASSWORD_DEFAULT),
            'registered'
        ]);
    }

    public function createNoAccountUser(string $nom, $prenom, $tel, $date, $time)
    {
        $token = bin2hex(random_bytes(16));

        // 1. Créer l'utilisateur "guest"
        $stmt = $this->pdo->prepare('INSERT INTO users (nom, prenom, tel, type) VALUES (?, ?, ?, "guest")');
        $stmt->execute([$nom, $prenom, $tel]);
        $userId = $this->pdo->lastInsertId();

        // 2. Enregistrer le rendez-vous
        $stmt = $this->pdo->prepare('INSERT INTO rdv (user_id, date, time, token) VALUES (?, ?, ?, ?)');
        $stmt->execute([$userId, $date, $time, $token]);

        return $token;
    }

    public function createAppointmentForConnectedUser(int $userId, string $date, string $time): string
    {
        $token = bin2hex(random_bytes(16)); // Génère un token unique

        // 1. Vérifie que le créneau est encore disponible (optionnel mais conseillé)
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM rdv WHERE date = ? AND time = ?');
        $stmt->execute([$date, $time]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            throw new \Exception("Ce créneau n'est plus disponible.");
        }

        // 2. Enregistre le rendez-vous
        $stmt = $this->pdo->prepare('INSERT INTO rdv (user_id, date, time, token) VALUES (?, ?, ?, ?)');
        $stmt->execute([$userId, $date, $time, $token]);

        // 3. Supprime la disponibilité si tu gères une table dispo
        $this->deleteDispo($date, $time);

        return $token;
    }




    public function exists(string $email): bool
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public function login(string $email, string $password)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function seeApointment($token)
    {
        $stmt = $this->pdo->prepare('
        SELECT users.nom, users.tel, rdv.date, rdv.time
        FROM rdv
        JOIN users ON rdv.user_id = users.id
        WHERE rdv.token = ?
    ');
        $stmt->execute([$token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function deleteDispo($date, $time)
    {
        $stmt = $this->pdo->prepare('DELETE FROM dispo WHERE date = ? AND time = ?');
        return $stmt->execute([$date, $time]);
    }

    public function appointmentReserved()
    {
        $stmt = $this->pdo->query('
        SELECT rdv.*, users.nom, users.tel, users.email
        FROM rdv
        JOIN users ON rdv.user_id = users.id
        ORDER BY rdv.date ASC, rdv.time ASC
    ');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAppointmentsByDate($date)
    {
        $stmt = $this->pdo->prepare('
        SELECT rdv.*, users.nom, users.tel, users.email
        FROM rdv 
        JOIN users ON rdv.user_id = users.id 
        WHERE rdv.date = ? 
        ORDER BY rdv.time ASC
    ');
        $stmt->execute([$date]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
