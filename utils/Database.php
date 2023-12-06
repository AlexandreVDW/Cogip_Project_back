<?php

declare(strict_types=1);

namespace App\utils;

use PDO;
use PDOException;
use App\utils\Log;

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
            $this->pdo = new PDO(
                "{$this->log->host};{$this->log->db};charset=utf8",
                $this->log->user, 
                $this->log->pass
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