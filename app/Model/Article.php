<?php

namespace App\Model;

use PDO;

class Article
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($title, $content, $image)
    {
        $stmt = $this->pdo->prepare('INSERT INTO actualite (title, content, image) VALUES (?, ?, ?)');
        return $stmt->execute([$title, $content, $image]);
    }

    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM actualite');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM actualite WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $content)
    {
        $stmt = $this->pdo->prepare('UPDATE actualite SET title = ?, content = ? WHERE id = ?');
        return $stmt->execute([$title, $content, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM actualite WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
