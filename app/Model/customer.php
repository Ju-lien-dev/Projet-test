<?php

namespace App\Model;
use PDO;

class Customer
{
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($name, $firstName, $phone, $email, $password ) {
        $stmt = $this->pdo->prepare('INSERT INTO post (name, firstName, phone, email, password) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$name, $firstName, $phone, $email, $password]);
    }

}