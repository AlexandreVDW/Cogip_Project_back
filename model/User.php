<?php

declare(strict_types=1);

namespace App\model;

class User 
{
    public int $id;
    public string $first_name;
    public int $role_id;
    public string $last_name;
    public string $email;
    public string $password;
    public datetime $created_at;
    public datetime $updated_at;

    public function __construct(int $id, string $first_name, int $role_id, string $last_name, string $email, string $password, datetime $created_at, datetime $updated_at)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->role_id = $role_id;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
    
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllUsers()
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "SELECT * FROM users";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }

    public function getOneUser($id)
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }

    public function setNewUser ()
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "INSERT INTO users (first_name, role_id, last_name, email, password, created_at, updated_at) VALUES (:first_name, :role_id, :last_name, :email, :password, :created_at, :updated_at)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':first_name', $this->first_name);
        $stmt->bindValue(':role_id', $this->role_id);
        $stmt->bindValue(':last_name', $this->last_name);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':password', $this->password);
        $stmt->bindValue(':created_at', $this->created_at);
        $stmt->bindValue(':updated_at', $this->updated_at);
        $stmt->execute();
    }

    public function updateUser ($id, $first_name, $role_id, $last_name, $email, $password, $updated_at)
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "UPDATE users SET first_name = :first_name, role_id = :role_id, last_name = :last_name, email = :email, password = :password, updated_at = :updated_at WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':first_name', $first_name);
        $stmt->bindValue(':role_id', $role_id);
        $stmt->bindValue(':last_name', $last_name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':updated_at', $updated_at);
        $stmt->execute();
    }

    public function deleteUser ($id)
    {
        $db = new Database();
        $connect = $pdo -> connect();
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}