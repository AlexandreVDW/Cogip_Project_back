<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Types;

class TypesController
{
    public function Types()
    {
        $types = new Types();
        $types = $types->getAllTypes();
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