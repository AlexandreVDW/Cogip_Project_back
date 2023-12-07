<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Types;

class RolesPermissionController
{
    public function RolesPermission()
    {
        $rolesPermission = new RolesPermission();
        $rolesPermission = $rolesPermission->getAllRolesPermission();
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $rolesPermission
        ], JSON_PRETTY_PRINT);
    }

    public function RolePermission($id)
    {
        $rolesPermission = new RolesPermission();
        $rolesPermission = $rolesPermission->getOneRolesPermission($id);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $rolesPermission
        ], JSON_PRETTY_PRINT);
    }
}