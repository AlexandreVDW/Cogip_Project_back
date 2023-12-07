<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\User;

class UserController
{
    public function User()
    {
        $user = new User();
        $user = $user->getAllUsers();
        header('Content-Type: application/json');
        echo json_encode(['user' => $user]);
    }
}