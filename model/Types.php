<?php

declare(strict_types=1);

namespace App\model;

use App\utils\Database;
use App\Core\Pagination;
use PDO;

class Types
{
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllTypes(Pagination $pagination)
    {
        list($limit, $offset) = $pagination->getItemsPerPage();

        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT * FROM types LIMIT :limit OFFSET :offset";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $types;
    }

    public function getOneType($id)
    {
       
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT * FROM types WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $types = $stmt->fetch(PDO::FETCH_ASSOC);
        return $types;
    }

    public function setNewTypes($name)
    {
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "INSERT INTO types (name, created_at, updated_at) VALUES (:name, :created_at, :updated_at)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':name', $name);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':created_at', $currentDateTime);
        $stmt->bindValue(':updated_at', $currentDateTime);
        return $stmt->execute();
    }

    public function updateType($id, $name, $updated_at)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "UPDATE types SET name = :name, updated_at = :updated_at WHERE id = :id";
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
        $sql = "DELETE FROM types WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}