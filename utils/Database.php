<?php

declare(strict_types = 1);

namespace App\Models;

require_once './Helpers/log.php';

class DatabaseManager {
    private $pdo;

    public function __construct() {
        global $host, $dbname, $charset, $login, $password;

        try {
            $this->pdo = new \PDO(
                "mysql:host={$host};dbname={$dbname};charset={$charset}",
                $login, 
                $password
            );
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    public function query($sql) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPdo() {
        return $this->pdo;
    }
}