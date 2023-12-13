<?php

declare(strict_types=1);

namespace App\model;

use App\utils\Database;
use PDO;

class Companies
{
    
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllCompanies()
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT companies.id, companies.name, companies.type_id, types.name as types_name, companies.country, companies.tva, companies.created_at, companies.updated_at FROM companies INNER JOIN types ON companies.type_id = types.id";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $companies;
    }

    public function getOneCompanie($id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT companies.id, companies.name, companies.type_id, types.name as types_name, companies.country, companies.tva, companies.created_at, companies.updated_at FROM companies INNER JOIN types ON companies.type_id = types.id WHERE companies.id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $companie = $stmt->fetch(PDO::FETCH_ASSOC);
        return $companie;
    }

    public function setNewCompanies($name, $type_id, $country, $tva)
    {
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $type_id = htmlspecialchars($type_id, ENT_QUOTES, 'UTF-8');
        $country = htmlspecialchars($country, ENT_QUOTES, 'UTF-8');
        $tva = htmlspecialchars($tva, ENT_QUOTES, 'UTF-8');

        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "INSERT INTO companies (name, type_id, country, tva, created_at, updated_at) VALUES (:name, :type_id, :country, :tva, :created_at, :updated_at)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':type_id', $type_id);
        $stmt->bindValue(':country', $country);
        $stmt->bindValue(':tva', $tva);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':created_at', $currentDateTime);
        $stmt->bindValue(':updated_at', $currentDateTime);
        return $stmt->execute();
    }

    public function updateCompanies($id, $name, $type_id, $country, $tva)
    {
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $type_id = htmlspecialchars($type_id, ENT_QUOTES, 'UTF-8');
        $country = htmlspecialchars($country, ENT_QUOTES, 'UTF-8');
        $tva = htmlspecialchars($tva, ENT_QUOTES, 'UTF-8');

        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "UPDATE companies SET name = :name, type_id = :type_id, country = :country, tva = :tva, updated_at = :updated_at WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':type_id', $type_id);
        $stmt->bindValue(':country', $country);
        $stmt->bindValue(':tva', $tva);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':updated_at', $currentDateTime);
        return $stmt->execute();
    }

}