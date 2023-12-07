<?php

declare(strict_types=1);

namespace App\utils;

use PDO;
use PDOException;


class Database 
{
    private Log $log;
    private ?PDO $pdo = null;

    public function __construct()
    {
        $this->log = new Log();
    }

    public function connectDB()
    {
        try {
            $dsn = "{$this->log->host};{$this->log->db}";
            $this->pdo = new PDO($dsn, $this->log->user, $this->log->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'connection réussie';
        }
        catch(PDOException $e)
        {
            echo 'erreur de connection: ' . $e->getMessage();
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