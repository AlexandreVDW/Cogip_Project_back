<?php

declare(strict_types=1);

namespace App\model;

use App\utils\Database;
use PDO;

class RolesPermission
{
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllRolesPermission()
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT * FROM roles_permission";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOneRolesPermission($id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT * FROM roles_permission WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function setNewRolesPermission($id, $permission_id, $role_id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "INSERT INTO roles_permission (id, permission_id, role_id) VALUES (:id, :permission_id, :role_id)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':permission_id', $permission_id);
        $stmt->bindValue(':role_id', $role_id);
        $stmt->execute();
    }

    public function updateRolesPermission($id, $permission_id, $role_id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "UPDATE roles_permission SET permission_id = :permission_id, role_id = :role_id WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':permission_id', $permission_id);
        $stmt->bindValue(':role_id', $role_id);
        $stmt->execute();
    }

    public function deleteRolesPermission($id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "DELETE FROM roles_permission WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}