<?php

namespace App\Model;

use PDO;

class Customer
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($name, $firstName, $phone, $email, $password)
    {
        $stmt = $this->pdo->prepare('INSERT INTO post (name, firstName, phone, email, password) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$name, $firstName, $phone, $email, $password]);
    }

    public function getAllPatients()
    {
        $stmt = $this->pdo->query('SELECT * FROM users WHERE is_admin = "0"');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
