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

    public function setNewPermission ($name)
    {
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "INSERT INTO permissions (name, created_at, updated_at) VALUES (:name, :created_at, :updated_at)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':name', $name);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':created_at', $currentDateTime);
        $stmt->bindValue(':updated_at', $currentDateTime);
        return $stmt->execute();
    }

    public function updatePermission ($id, $name)
    {
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "UPDATE permissions SET name = :name, updated_at = :updated_at WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':updated_at', $currentDateTime);
        return $stmt->execute();
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