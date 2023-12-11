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
}