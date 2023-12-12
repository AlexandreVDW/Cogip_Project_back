<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Permission;
use App\Core\Pagination;


class PermissionController
{
    public function Permissions()
    {
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = $_GET['itemsPerPage'] ?? 100;
        $pagination = new Pagination();
        $pagination->setPage($currentPage);
        $pagination->setItemsPerPage($itemsPerPage);
   
        $permission = new Permission();
        $permission = $permission->getAllPermissions($pagination);
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