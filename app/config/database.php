<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'dentiste');
define('DB_USER', 'root');
define('DB_PASS', 'root');

try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';port=8889;dbname=' . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
