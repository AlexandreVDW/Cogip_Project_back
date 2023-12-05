<?php

declare(strict_types=1);

namespace App\model;

class Companies
{
    public int $id;
    public string $name;
    public string $type_id;
    public string $country;
    public string $tva;
    public datetime $created_at;
    public datetime $updated_at;

    public function __construct(int $id, string $name, string $type_id, string $country, string $tva, datetime $created_at, datetime $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->vat = $type_id;
        $this->country = $country;
        $this->type = $tva;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
    
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllCompanies()
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "SELECT * FROM companies";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getOneCompany($id)
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "SELECT * FROM companies WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function setNewCompanies($name, $type_id, $country, $tva, $created_at, $updated_at)
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "INSERT INTO companies (name, type_id, country, tva, created_at, updated_at) VALUES (:name, :type_id, :country, :tva, :created_at, :updated_at)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':type_id', $type_id);
        $stmt->bindValue(':country', $country);
        $stmt->bindValue(':tva', $tva);
        $stmt->execute();
    }

    public function updateCompanies($id, $name, $type_id, $country, $tva, $updated_at)
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "UPDATE companies SET name = :name, type_id = :type_id, country = :country, tva = :tva, updated_at = :updated_at WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':type_id', $type_id);
        $stmt->bindValue(':country', $country);
        $stmt->bindValue(':tva', $tva);
        $stmt->bindValue(':updated_at', $updated_at);
        $stmt->execute();
    }

    public function deleteCompanies($id)
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "DELETE FROM companies WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}