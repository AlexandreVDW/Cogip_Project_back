<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Types;
use App\Core\Pagination;

class TypesController
{
    public function Types()
    {
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = $_GET['itemsPerPage'] ?? 100;
        $pagination = new Pagination();
        $pagination->setPage($currentPage);
        $pagination->setItemsPerPage($itemsPerPage);
   
        $types = new Types();
        $types = $types->getAllTypes($pagination);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $types
        ], JSON_PRETTY_PRINT);
    }

    public function Type($id)
    {
        $types = new Types();
        $types = $types->getOneType($id);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $types
        ], JSON_PRETTY_PRINT);
    }
}