<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Companies;
use App\Core\Pagination;

class CompaniesController
{
    public function Companies()
    {
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = $_GET['itemsPerPage'] ?? 100;
        $pagination = new Pagination();
        $pagination->setPage($currentPage);
        $pagination->setItemsPerPage($itemsPerPage);
   
        $companies = new Companies();
        $companies = $companies->getAllCompanies($pagination);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $companies
        ], JSON_PRETTY_PRINT);
    }

    public function Companie($id)
    {
        $companies = new Companies();
        $companies = $companies->getOneCompanie($id);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $companies
        ], JSON_PRETTY_PRINT);
    }

    public function setNewCompanies()
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['name'], $data['type_id'], $data['country'], $data['tva'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $name = $data['name'];
        $type_id = $data['type_id'];
        $country = $data['country'];
        $tva = $data['tva'];

        $companies = new Companies();
        $result = $companies->setNewCompanies($name, $type_id, $country, $tva);
        
        if(!$result) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 500,
                'message' => 'Internal Server Error',
                'data' => $result
            ], JSON_PRETTY_PRINT);
        } else {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 201,
                'message' => 'created',
                'data' => $result
            ], JSON_PRETTY_PRINT);
        }
    }

    public function updateCompanies($id)
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['name'], $data['type_id'], $data['country'], $data['tva'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $name = $data['name'];
        $type_id = $data['type_id'];
        $country = $data['country'];
        $tva = $data['tva'];

        $companies = new Companies();
        $result = $companies->updateCompanies($id, $name, $type_id, $country, $tva);
        
        if(!$result) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 500,
                'message' => 'Internal Server Error',
                'data' => $result
            ], JSON_PRETTY_PRINT);
        } else {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 202,
                'message' => 'Updated',
                'data' => $result
            ], JSON_PRETTY_PRINT);
        }
    }
    public function deleteCompanies($id)
    {
        $companies = new Companies();
        $result = $companies->deleteCompanies($id);
        
        if(!$result) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 500,
                'message' => 'Internal Server Error',
                'data' => $result
            ], JSON_PRETTY_PRINT);
        }

        header('Content-Type: application/json');
        echo json_encode([
                'status' => 202,
                'message' => 'Deleted',
                'data' => $result
            ], JSON_PRETTY_PRINT);
    }
}