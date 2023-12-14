<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Users;

class UserController
{
    public function Users()
    {
        $users = new Users();
        $users = $users->getAllUsers();
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $users
        ], JSON_PRETTY_PRINT);
    }

    public function User($id)
    {
        $users = new Users();
        $users = $users->getOneUser($id);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $users
        ], JSON_PRETTY_PRINT);
    }

    public function setNewUser()
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['first_name'], $data['role_id'], $data['last_name'], $data['email'], $data['password'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $first_name = $data['first_name'];
        $role_id = $data['role_id'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $password = $data['password'];

        $users = new Users();
        $result = $users->setNewUser($first_name, $role_id, $last_name, $email, $password);
        
        if(!$result) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 500,
                'message' => 'Internal Server Error',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        header('Content-Type: application/json');
        echo json_encode([
            'status' => 201,
            'message' => 'Created',
            'data' => $data
        ], JSON_PRETTY_PRINT);
    }

    public function updateUser($id)
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['first_name'], $data['role_id'], $data['last_name'], $data['email'], $data['password'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $first_name = $data['first_name'];
        $role_id = $data['role_id'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $password = $data['password'];

        $users = new Users();
        $result = $users->updateUser($id, $first_name, $role_id, $last_name, $email, $password);
        
        if(!$result) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 500,
                'message' => 'Internal Server Error',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        header('Content-Type: application/json');
        echo json_encode([
            'status' => 202,
            'message' => 'Updated',
            'data' => $data
        ], JSON_PRETTY_PRINT);
    }
}