<?php

declare(strict_types=1);

namespace App\model;
use App\utils\Database;
use PDO;

class Invoices
{
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllInvoices()
    {
        $pdo = new Database();
        $conn = $pdo->connectDB();
        $sql = "SELECT * FROM invoices";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOneInvoice($id)
    {
        $pdo = new Database();
        $conn = $pdo->connectDB();
        $sql = "SELECT * FROM invoices WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function setNewInvoices($ref, $company_id, $created_at, $updated_at)
    {
        $pdo = new Database();
        $conn = $pdo->connectDB();
        $sql = "INSERT INTO invoices (ref, company_id, created_at, updated_at) VALUES (:ref, :company_id, :created_at, :updated_at)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':ref', $ref);
        $stmt->bindValue(':company_id', $company_id);
        $stmt->bindValue(':created_at', $created_at);
        $stmt->bindValue(':updated_at', $updated_at);
        $stmt->execute();
    }

    public function updateInvoices ($id, $ref, $company_id, $updated_at)
    {
        $pdo = new Database();
        $conn = $pdo->connectDB();
        $sql = "UPDATE invoices SET ref = :ref, company_id = :company_id, updated_at = :updated_at WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':ref', $ref);
        $stmt->bindValue(':company_id', $company_id);
        $stmt->bindValue(':updated_at', $updated_at);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function deleteInvoices($id)
    {
        $pdo = new Database();
        $conn = $pdo->connectDB();
        $sql = "DELETE FROM invoices WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}