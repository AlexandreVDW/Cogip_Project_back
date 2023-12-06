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
        echo json_encode(['companies' => $companies]);
    }
}