<?php

declare(strict_types=1);

namespace App\model;

use App\utils\Database;
use App\Core\Pagination;
use PDO;

class Companies
{
    
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllCompanies(Pagination $pagination)
    {
        list($limit, $offset) = $pagination->getItemsPerPage();
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "SELECT companies.id, companies.name, companies.type_id, types.name as types_name, companies.country, companies.tva, companies.created_at, companies.updated_at FROM companies INNER JOIN types ON companies.type_id = types.id LIMIT :limit OFFSET :offset";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
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
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $type_id = filter_var($type_id, FILTER_SANITIZE_NUMBER_INT);
        $country = filter_var($country, FILTER_SANITIZE_STRING);
        $tva = filter_var($tva, FILTER_SANITIZE_STRING);

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
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $type_id = filter_var($type_id, FILTER_SANITIZE_NUMBER_INT);
        $country = filter_var($country, FILTER_SANITIZE_STRING);
        $tva = filter_var($tva, FILTER_SANITIZE_STRING);

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
 public function deleteCompanies($id)
    {
        $pdo = new Database();
        $connect = $pdo->connectDB();
        $sql = "DELETE FROM companies WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}