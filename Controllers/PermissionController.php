<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Permission;

class PermissionController
{
    public function Permissions()
    {
        $permission = new Permission();
        $permission = $permission->getAllPermissions();
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $permission
        ], JSON_PRETTY_PRINT);
    }

    public function Permission($id)
    {
        $permission = new Permission();
        $permission = $permission->getOnePermission($id);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $permission
        ], JSON_PRETTY_PRINT);
    }
}