<?php

declare(strict_types=1);

namespace App\model;
use App\utils\Database;
use App\Core\Pagination;
use PDO;

class Invoices
{
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllInvoices(Pagination $pagination)
    {
        list($limit, $offset) = $pagination->getItemsPerPage();

        $pdo = new Database();
        $conn = $pdo->connectDB();
        $sql = "SELECT invoices.id, invoices.ref, invoices.id_company, companies.name, invoices.created_at, invoices.updated_at FROM invoices  INNER JOIN companies ON invoices.id_company = companies.id LIMIT :limit OFFSET :offset";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOneInvoice($id)
    {
        $pdo = new Database();
        $conn = $pdo->connectDB();
        $sql = "SELECT invoices.id, invoices.ref, invoices.id_company, companies.name, invoices.created_at, invoices.updated_at FROM invoices INNER JOIN companies ON invoices.id_company = companies.id WHERE invoices.id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function setNewInvoices($ref, $id_company)
    {
        $ref = htmlspecialchars($ref, ENT_QUOTES, 'UTF-8');
        $id_company = filter_var($id_company, FILTER_SANITIZE_NUMBER_INT);

        $pdo = new Database();
        $conn = $pdo->connectDB();
        $sql = "INSERT INTO invoices (ref, id_company, created_at, updated_at) VALUES (:ref, :id_company, :created_at, :updated_at)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':ref', $ref);
        $stmt->bindValue(':id_company', $id_company);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':created_at', $currentDateTime);
        $stmt->bindValue(':updated_at', $currentDateTime);
        return $stmt->execute();
    }

    public function updateInvoices ($id, $ref, $id_company)
    {
        $ref = htmlspecialchars($ref, ENT_QUOTES, 'UTF-8');
        $id_company = filter_var($id_company, FILTER_SANITIZE_NUMBER_INT);

        $pdo = new Database();
        $conn = $pdo->connectDB();
        $sql = "UPDATE invoices SET ref = :ref, id_company = :id_company, updated_at = :updated_at WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':ref', $ref);
        $stmt->bindValue(':id_company', $id_company);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':updated_at', $currentDateTime);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function deleteInvoices($id)
    {
        $pdo = new Database();
        $conn = $pdo->connectDB();
        $sql = "DELETE FROM invoices WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
   
}