<?php

namespace App\Model;

use PDO;

class Appointment
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function createDispo($date, $time)
    {
        $stmt = $this->pdo->prepare('INSERT INTO dispo (date, time) VALUES (?, ?)');
        return $stmt->execute([$date, $time]);
    }
    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM users WHERE date IS NOT NULL AND time IS NOT NULL");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function seeDispo()
    {
        $stmt = $this->pdo->query('SELECT * FROM dispo');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nom, $prenom, $email, $tel, $date, $time, $message)
    {
        $stmt = $this->pdo->prepare('UPDATE rdv SET nom = ?, prenom = ?,email = ?, tel = ?, date = ?, time = ?, message = ? WHERE id = ?');
        return $stmt->execute([$id, $nom, $prenom, $email, $tel, $date, $time, $message]);
    }

    public function delete($token)
    {
        $stmt = $this->pdo->prepare('DELETE FROM rdv WHERE token = ?');
        return $stmt->execute([$token]);
    }
    public function getAppointmentsByUserId($userId)
    {
        $sql = "SELECT * FROM rdv
            WHERE user_id = ? 
              AND CONCAT(date, ' ', time) >= NOW()
            ORDER BY date ASC, time ASC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
