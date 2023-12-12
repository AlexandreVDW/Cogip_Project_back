<?php

declare(strict_types=1);

namespace App\model;

use App\utils\Database;
use App\Core\Pagination;
use PDO;

class Roles
{
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllRoles(Pagination $pagination)
    {
        list($limit, $offset) = $pagination->getItemsPerPage();
       
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT * FROM roles LIMIT :limit OFFSET :offset";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
    }

    public function getOneRole($id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT * FROM roles WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $roles = $stmt->fetch(PDO::FETCH_ASSOC);
        return $roles;
    }

    public function setNewRoles($name, $created_at, $updated_at)
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

    public function updateRoles($id, $name, $updated_at)
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

    public function deleteRoles($id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "DELETE FROM roles WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}