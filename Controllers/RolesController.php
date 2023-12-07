<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Roles;

class RolesController
{
    public function Roles()
    {
        $roles = new Roles();
        $roles = $roles->getAllRoles();
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $roles
        ], JSON_PRETTY_PRINT);
    }

    public function Role($id)
    {
        $roles = new Roles();
        $roles = $roles->getOneRole($id);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $roles
        ], JSON_PRETTY_PRINT);
    }
}