<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Roles;
use App\Core\Pagination;

class RolesController
{
    public function Roles()
    {
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = $_GET['itemsPerPage'] ?? 100;
        $pagination = new Pagination();
        $pagination->setPage($currentPage);
        $pagination->setItemsPerPage($itemsPerPage);

        $roles = new Roles();
        $roles = $roles->getAllRoles($pagination);
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

    public function setNewRoles()
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['name']) || empty($data['name'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $name = $data['name'];

        $roles = new Roles();
        $result = $roles->setNewRoles($name);
        
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

    public function updateRoles($id)
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['name']) || empty($data['name'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $name = $data['name'];

        $roles = new Roles();
        $result = $roles->updateRoles($id, $name);
        
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