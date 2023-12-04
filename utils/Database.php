<?php

// declare(strict_types = 1);

// namespace App\Models;

// require_once './Helpers/log.php';

// class DatabaseManager {
//     private $pdo;

//     public function __construct() {
//         global $host, $dbname, $charset, $login, $password;

//         try {
//             $this->pdo = new \PDO(
//                 "mysql:host={$host};dbname={$dbname};charset={$charset}",
//                 $login, 
//                 $password
//             );
//         } catch(Exception $e) {
//             die('Erreur : '.$e->getMessage());
//         }
//     }

//     public function query($sql) {
//         $stmt = $this->pdo->prepare($sql);
//         $stmt->execute();
//         return $stmt->fetchAll(\PDO::FETCH_ASSOC);
//     }

//     public function getPdo() {
//         return $this->pdo;
//     }
// }


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