<?php

declare(strict_types=1);

namespace App\model;

class Permission
{
    public int $id;
    public string $name;
    public datetime $created_at;
    public datetime $updated_at;

    public function __construct(int $id, string $name, datetime $created_at, datetime $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllPermissions()
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "SELECT * FROM permissions";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $permissions = $stmt->fetchAll();
        return $permissions;
    }

    public function getOnePermission($id)
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "SELECT * FROM permissions WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $permission = $stmt->fetch();
        return $permission;
    }

    public function setNewPermission ()
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "INSERT INTO permissions (name, created_at, updated_at) VALUES (:name, :created_at, :updated_at)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':created_at', $this->created_at);
        $stmt->bindValue(':updated_at', $this->updated_at);
        $stmt->execute();
    }

    public function updatePermission ($id, $name, $updated_at)
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "UPDATE permissions SET name = :name, updated_at = :updated_at WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':updated_at', $this->updated_at);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function deletePermission($id)
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "DELETE FROM permissions WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}