<?php

declare(strict_types=1);

namespace App\model;

class Contacts
{
    public int $id;
    public string $name;
    public int $company_id;
    public string $email;
    public string $phone;
    public datetime $created_at;
    public datetime $updated_at;

    public function __construct(int $id, string $name, int $company_id, string $email, string $phone, datetime $created_at, datetime $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->company_id = $company_id;
        $this->email = $email;
        $this->phone = $phone;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllContacts()
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "SELECT * FROM contacts";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $contacts = $stmt->fetchAll();
        return $contacts;
    }

    public function getOneContact($id)
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $contact = $stmt->fetch();
        return $contact;
    }

    public function setNewContact ()
    {
        $db = new Database();
        $connect = $pdo -> connect();
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
        $db = new Database();
        $connect = $pdo -> connect();
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
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "DELETE FROM contacts WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}