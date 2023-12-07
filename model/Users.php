<?php

declare(strict_types=1);

namespace App\model;

use App\utils\Database;
use PDO;

class Users 
{
    
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }

    public function getAllUsers()
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "SELECT * FROM users";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function getOneUser($id)
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function setNewUser ()
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
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
        $pdo = new Database();
        $connect = $pdo -> connectDB();
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

    public function deleteUserDB ($id)
    {
        $pdo = new Database();
        $connect = $pdo -> connect();
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}