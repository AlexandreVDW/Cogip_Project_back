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
        $sql = "SELECT roles_permission.id, roles_permission.permission_id, permissions.name as permissions_name, roles_permission.role_id, roles.name as roles_name FROM roles_permission INNER JOIN permissions ON roles_permission.permission_id = permissions.id INNER JOIN roles ON roles_permission.role_id = roles.id";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $rolespermission = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rolespermission;
    }

    public function getOneRolesPermission($id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT roles_permission.id, roles_permission.permission_id, permissions.name as permissions_name, roles_permission.role_id, roles.name as roles_name FROM roles_permission INNER JOIN permissions ON roles_permission.permission_id = permissions.id INNER JOIN roles ON roles_permission.role_id = roles.id WHERE roles_permission.id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $rolespermission = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rolespermission;
    }

    public function setNewRolesPermission($permission_id, $role_id)
    {
        $permission_id = filter_var($permission_id, FILTER_SANITIZE_NUMBER_INT);
        $role_id = filter_var($role_id, FILTER_SANITIZE_NUMBER_INT);

        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "INSERT INTO roles_permission (permission_id, role_id) VALUES (:permission_id, :role_id)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':permission_id', $permission_id);
        $stmt->bindValue(':role_id', $role_id);
        return $stmt->execute();
    }

    public function updateRolesPermission($permission_id, $role_id)
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