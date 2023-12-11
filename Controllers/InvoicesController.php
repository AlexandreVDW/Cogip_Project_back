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

        if ($data === null || !isset($data['ref'], $data['company_id'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }
    $ref = $data['ref'];
    $company_id = $data['company_id'];
    
    $invoices = new Invoices();
    $result = $invoices->setNewInvoices($ref, $company_id);

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
    $ref = $_POST['ref'];
    $company_id = $_POST['company_id'];
    $updated_at = $_POST['updated_at'];
    $invoices = new Invoices();
    $invoices = $invoices->updateInvoices($id, $ref, $company_id, $updated_at);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $invoices
        ], JSON_PRETTY_PRINT);
    }

    public function deleteInvoices($id)
    {
    $invoices = new Invoices();
    $invoices = $invoices->deleteInvoices($id);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $invoices
        ], JSON_PRETTY_PRINT);
    }
}