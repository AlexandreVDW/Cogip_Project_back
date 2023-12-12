<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Invoices;

class InvoicesController
{
    public function Invoices()
    {
    $invoices = new Invoices();
    $invoices = $invoices->getAllInvoices();
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $invoices
        ], JSON_PRETTY_PRINT);
    }

    public function Invoice($id)
    {
    $invoices = new Invoices();
    $invoices = $invoices->getOneInvoice($id);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $invoices
        ], JSON_PRETTY_PRINT);
    }

    public function setNewInvoices()
    {

        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['ref'], $data['id_company'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }
        $ref = $data['ref'];
        $id_company = $data['id_company'];
        
        $invoices = new Invoices();
        $result = $invoices->setNewInvoices($ref, $id_company);

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

    public function updateInvoices($id)
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['ref'], $data['id_company'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }
        $ref = $data['ref'];
        $id_company = $data['id_company'];
        
        $invoices = new Invoices();
        $result = $invoices->updateInvoices($id, $ref, $id_company);

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