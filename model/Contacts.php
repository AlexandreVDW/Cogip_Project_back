<?php

declare(strict_types=1);

namespace App\model;

use App\utils\Database;
use App\Core\Pagination;
use PDO;

class Contacts
{
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllContacts(Pagination $pagination)
    {

        list($limit, $offset) = $pagination->getItemsPerPage();

        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "SELECT contacts.id, contacts.name, contacts.company_id, companies.name as company_name, contacts.email, contacts.phone, contacts.created_at, contacts.updated_at FROM contacts  INNER JOIN companies on contacts.company_id = companies.id LIMIT :limit OFFSET :offset";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;
    }

    public function getOneContact($id)
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "SELECT contacts.id, contacts.name, contacts.company_id, companies.name as company_name, contacts.email, contacts.phone, contacts.created_at, contacts.updated_at FROM contacts INNER JOIN companies on contacts.company_id = companies.id WHERE contacts.id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);
        return $contact;
    }

    public function setNewContact ($name, $company_id, $email, $phone)
    {
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $company_id = filter_var($company_id, FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');

        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "INSERT INTO contacts (name, company_id, email, phone, created_at, updated_at) VALUES (:name, :company_id, :email, :phone, :created_at, :updated_at)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':company_id', $company_id);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':created_at', $currentDateTime);
        $stmt->bindValue(':updated_at', $currentDateTime);
        return $stmt->execute();
    }

    public function updateContact($id, $name, $company_id, $email, $phone)
    {
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $company_id = filter_var($company_id, FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');

        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "UPDATE contacts SET name = :name, company_id = :company_id, email = :email, phone = :phone, updated_at = :updated_at WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':company_id', $company_id);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':updated_at', $currentDateTime);
        return $stmt->execute();
    }

    public function deleteContacts($id)
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "DELETE FROM contacts WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}