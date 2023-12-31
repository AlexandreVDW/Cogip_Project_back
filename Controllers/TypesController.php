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

    public function setNewTypes()
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

        $types = new Types();
        $result = $types->setNewTypes($name);
        
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

    public function updateTypes($id)
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

        $types = new Types();
        $result = $types->updateTypes($id, $name);
        
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

    public function deleteTypes($id)
    {
        $types = new Types();
        $result = $types->deleteTypes($id);
        
        if(!$result) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 500,
                'message' => 'Internal Server Error',
                'data' => $result
            ], JSON_PRETTY_PRINT);
            return;
        }
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 202,
            'message' => 'Deleted',
            'data' => $result
        ], JSON_PRETTY_PRINT);
    }
}