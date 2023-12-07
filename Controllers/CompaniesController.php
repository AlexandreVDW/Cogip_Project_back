<?php

namespace App\Controllers;

use App\Core\Controller;
use App\model\Companies;

class CompagniesController
{
    public function Companies()
    {
        $companies = new Companies();
        $data = $companies->getAllCompanies();
        return $this->view('companies', $data);
    }


}