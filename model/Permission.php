<?php

declare(strict_types=1);

namespace App\model;

use App\utils\Database;
use PDO;

class Permission
{
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllPermissions()
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "SELECT * FROM permissions";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $permissions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $permissions;
    }

    public function getOnePermission($id)
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "SELECT * FROM permissions WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $permission = $stmt->fetch(PDO::FETCH_ASSOC);
        return $permission;
    }

    public function setNewPermission ()
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "INSERT INTO permissions (name, created_at, updated_at) VALUES (:name, :created_at, :updated_at)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':created_at', $this->created_at);
        $stmt->bindValue(':updated_at', $this->updated_at);
        $stmt->execute();
    }

    public function updatePermission ($id, $name, $updated_at)
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "UPDATE permissions SET name = :name, updated_at = :updated_at WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':updated_at', $this->updated_at);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function deletePermission($id)
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "DELETE FROM permissions WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}