<?php

namespace App\Model;

use PDO;

class ClientModel
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getInfoClient($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateClient($id, $nom, $prenom, $email, $tel)
    {
        $stmt = $this->pdo->prepare('UPDATE users SET nom = :nom, prenom = :prenom, email = :email, tel = :tel WHERE id = :id');
        return $stmt->execute([
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'tel' => $tel
        ]);
    }
}
