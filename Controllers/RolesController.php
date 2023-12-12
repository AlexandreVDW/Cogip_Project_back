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
}