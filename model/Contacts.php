<?php

declare(strict_types=1);

namespace App\model;

use App\utils\Database;
use PDO;

class Contacts
{
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllContacts()
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "SELECT contacts.id, contacts.name, contacts.company_id, companies.name as company_name, contacts.email, contacts.phone, contacts.created_at, contacts.updated_at FROM contacts INNER JOIN companies on contacts.company_id = companies.id";
        $stmt = $connect->prepare($sql);
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

    public function setNewContact ()
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "INSERT INTO contacts (name, company_id, email, phone, created_at, updated_at) VALUES (:name, :company_id, :email, :phone, :created_at, :updated_at)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':company_id', $this->company_id, PDO::PARAM_INT);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $stmt->bindValue(':created_at', $this->created_at, PDO::PARAM_STR);
        $stmt->bindValue(':updated_at', $this->updated_at, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateContact($id, $name, $company_id, $email, $phone, $updated_at)
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "UPDATE contacts SET name = :name, company_id = :company_id, email = :email, phone = :phone, updated_at = :updated_at WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':company_id', $company_id);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':updated_at', $updated_at);
        $stmt->execute();
    }

    public function deleteContact($id)
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "DELETE FROM contacts WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}