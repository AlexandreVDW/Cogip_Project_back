<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\RolesPermission;
use App\Core\Pagination;

class RolesPermissionController
{
    public function RolesPermission()
    {
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = $_GET['itemsPerPage'] ?? 100;
        $pagination = new Pagination();
        $pagination->setPage($currentPage);
        $pagination->setItemsPerPage($itemsPerPage);

        $rolesPermission = new RolesPermission();
        $rolesPermission = $rolesPermission->getAllRolesPermission($pagination);
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

    public function setNewRolesPermission()
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);
        
        if ($data === null || !isset($data['permission_id'], $data['role_id']) || empty($data['permission_id']) || empty($data['role_id'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $permission_id = $data['permission_id'];
        $role_id = $data['role_id'];

        $rolesPermission = new RolesPermission();
        $result = $rolesPermission->setNewRolesPermission($permission_id, $role_id);
        
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

    public function updateRolesPermission($id)
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);
        
        if ($data === null || !isset($data['permission_id'], $data['role_id']) || empty($data['permission_id']) || empty($data['role_id'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $permission_id = $data['permission_id'];
        $role_id = $data['role_id'];

        $rolesPermission = new RolesPermission();
        $result = $rolesPermission->updateRolesPermission($id, $permission_id, $role_id);
        
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