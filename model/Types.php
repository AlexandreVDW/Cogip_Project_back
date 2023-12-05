<?php

declare(strict_types=1);

namespace App\model;

class strict_types{
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

    public function getAllTypes()
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "SELECT * FROM roles";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getOneType($id)
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "SELECT * FROM roles WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function setNewTypes($name, $created_at, $updated_at)
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "INSERT INTO roles (name, created_at, updated_at) VALUES (:name, :created_at, :updated_at)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':created_at', $created_at);
        $stmt->bindValue(':updated_at', $updated_at);
        $stmt->execute();
    }

    public function updateType($id, $name, $updated_at)
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "UPDATE roles SET name = :name, updated_at = :updated_at WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':updated_at', $updated_at);
        $stmt->execute();
    }

    public function deleteType($id)
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "DELETE FROM roles WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}