<?php

namespace App\Controller;

use App\Model\Article;
use PDO;

class HomeController
{
    private $article;

    public function __construct()
    {
        global $pdo;
        $this->article = new Article($pdo);
    }

    public function index()
    {
        // This is the home page logic
        include_once __DIR__ . '/../View/home.php';
    }



    public function services()
    {
        include_once __DIR__ . '/../View/services.php';
    }

    public function about()
    {
        include_once __DIR__ . '/../View/about.php';
    }

    public function news()
    {
        $articles = $this->article->getAll();
        include_once __DIR__ . '/../View/news.php';
    }

    public function connection()
    {
        include_once __DIR__ . '/../View/connection.php';
    }

    public function enregistrement()
    {
        include_once __DIR__ . '/../View/newMemberForm.php';
    }
}
