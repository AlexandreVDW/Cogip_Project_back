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

    public function setNewCompanies()
    {
        // Récupérer le corps de la requête JSON
        $jsonBody = file_get_contents("php://input");
        // Transformer le JSON en un tableau PHP associatif
        $data = json_decode($jsonBody, true);

        $name = $_POST['name'];
        $type_id = $_POST['type_id'];
        $country = $_POST['country'];
        $tva = $_POST['tva'];
        $companies = new Companies();
        $companies = $companies->setNewCompanies($name, $type_id, $country, $tva);
        // header('Content-Type: application/json');
        // echo json_encode([
        //     'status' => 200,
        //     'message' => 'OK',
        //     'data' => $companies
        // ], JSON_PRETTY_PRINT);
    }
}