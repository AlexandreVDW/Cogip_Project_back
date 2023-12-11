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

    public function setNewPermission()
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['name'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $name = $data['name'];

        $permission = new Permission();
        $result = $permission->setNewPermission($name);
        
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
}