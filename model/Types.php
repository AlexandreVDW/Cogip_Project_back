<?php

declare(strict_types=1);

namespace App\model;

use App\utils\Database;
use PDO;

class Types
{
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllTypes()
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT * FROM roles";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $types;
    }

    public function getOneType($id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT * FROM roles WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $types = $stmt->fetch(PDO::FETCH_ASSOC);
        return $types;
    }

    public function setNewTypes($name, $created_at, $updated_at)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "INSERT INTO roles (name, created_at, updated_at) VALUES (:name, :created_at, :updated_at)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':created_at', $created_at);
        $stmt->bindValue(':updated_at', $updated_at);
        $stmt->execute();
    }

    public function updateType($id, $name, $updated_at)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "UPDATE roles SET name = :name, updated_at = :updated_at WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':updated_at', $updated_at);
        $stmt->execute();
    }

    public function deleteType($id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "DELETE FROM roles WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}