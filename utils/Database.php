<?php

declare(strict_types=1);

namespace App\utils;

use PDO;
use PDOException;

// ligne a commenter pour le deploiement en ligne
use Dotenv\Dotenv;

class Database 
{
    private Log $log;
    private ?PDO $pdo = null;

    public function __construct()
    {
        // les deux ligne a commenter pour le deploiement en ligne
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
    }

    public function connectDB()
    {
        try {
            $this->pdo = new PDO(
                "{$_ENV['DB_HOST']};{$_ENV['DB_NAME']};charset=utf8",
                $_ENV['DB_USER'], 
                $_ENV['DB_PASS']
            );
            return $this->pdo;
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function query($sql) {
        if ($this->pdo === null) {
            throw new \Exception('Must connect to DB before querying');
        }
        return $this->pdo->query($sql);
    }
}

// $db = new Database();
// $db->connectDB();