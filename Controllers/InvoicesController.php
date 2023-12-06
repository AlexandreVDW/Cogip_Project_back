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
    $ref = $_POST['ref'];
    $company_id = $_POST['company_id'];
    $created_at = $_POST['created_at'];
    $updated_at = $_POST['updated_at'];
    $invoices = new Invoices();
    $invoices = $invoices->setNewInvoices($ref, $company_id, $created_at, $updated_at);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $invoices
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