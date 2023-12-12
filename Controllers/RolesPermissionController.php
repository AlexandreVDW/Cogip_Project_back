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
}