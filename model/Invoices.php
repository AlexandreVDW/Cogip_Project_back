<?php

declare(strict_types=1);

namespace App\model;

class Invoices
{
    public int $id;
    public string $ref;
    public int $company_id;
    public datetime $created_at;
    public datetime $updated_at;

    public function __construct(int $id, string $ref, int $company_id, datetime $created_at, datetime $updated_at)
    {
        $this->id = $id;
        $this->ref = $ref;
        $this->company_id = $company_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllInvoices()
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "SELECT * FROM invoices";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getOneInvoice($id)
    {
        $pdo = new Database();
        $conn = $pdo->connect();
        $sql = "SELECT * FROM invoices WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function setNewInvoices($ref, $company_id, $created_at, $updated_at)
    {
        $pdo = new Database();
        $conn = $pdo->connect();
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
        $conn = $pdo->connect();
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
        $conn = $pdo->connect();
        $sql = "DELETE FROM invoices WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}