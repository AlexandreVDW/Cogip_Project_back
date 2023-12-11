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
        $sql = "SELECT users.id, users.first_name, users.last_name, users.role_id, roles.name as roles_name, users.email, users.password, users.created_at, users.updated_at FROM users INNER JOIN roles ON users.role_id = roles.id";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function getOneUser($id)
    {
        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "SELECT users.id, users.first_name, users.last_name, users.role_id, roles.name as roles_name, users.email, users.password, users.created_at, users.updated_at FROM users INNER JOIN roles ON users.role_id = roles.id WHERE users.id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function setNewUser ($first_name, $role_id, $last_name, $email, $password)
    {
        $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
        $role_id = filter_var($role_id, FILTER_SANITIZE_NUMBER_INT);
        $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $pdo = new Database();
        $connect = $pdo -> connectDB();
        $sql = "INSERT INTO users (first_name, role_id, last_name, email, password, created_at, updated_at) VALUES (:first_name, :role_id, :last_name, :email, :password, :created_at, :updated_at)";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':first_name', $first_name);
        $stmt->bindValue(':role_id', $role_id);
        $stmt->bindValue(':last_name', $last_name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':created_at', $currentDateTime);
        $stmt->bindValue(':updated_at', $currentDateTime);
        return $stmt->execute();
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
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt->bindValue(':updated_at', $currentDateTime);
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