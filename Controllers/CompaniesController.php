<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Companies;

class CompaniesController
{
    public function Companies()
    {
        $companies = new Companies();
        $companies = $companies->getAllCompanies();
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
}