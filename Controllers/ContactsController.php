<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Contacts;
use App\Core\Pagination;

class ContactsController 
{
    public function Contacts()
    {
    
     $currentPage = $_GET['page'] ?? 1;
     $itemsPerPage = $_GET['itemsPerPage'] ?? 100;
     $pagination = new Pagination();
     $pagination->setPage($currentPage);
     $pagination->setItemsPerPage($itemsPerPage);

   
        $contacts = new Contacts();
        $contacts = $contacts->getAllContacts($pagination);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $contacts
        ], JSON_PRETTY_PRINT);
    }

    public function Contact($id)
    {
        $contacts = new Contacts();
        $contacts = $contacts->getOneContact($id);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 200,
            'message' => 'OK',
            'data' => $contacts
        ], JSON_PRETTY_PRINT);
    }

    public function setNewContact()
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['name'], $data['company_id'], $data['email'], $data['phone'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $name = $data['name'];
        $company_id = $data['company_id'];
        $email = $data['email'];
        $phone = $data['phone'];

        $contacts = new Contacts();
        $result = $contacts->setNewContact($name, $company_id, $email, $phone);
        
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

    public function updateContact($id)
    {
        $jsonBody = file_get_contents("php://input");
        $data = json_decode($jsonBody, true);

        if ($data === null || !isset($data['name'], $data['company_id'], $data['email'], $data['phone'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'data' => $data
            ], JSON_PRETTY_PRINT);
            return;
        }

        $name = $data['name'];
        $company_id = $data['company_id'];
        $email = $data['email'];
        $phone = $data['phone'];

        $contacts = new Contacts();
        $result = $contacts->updateContact($id, $name, $company_id, $email, $phone);
        
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

    public function deleteContacts($id)
    {
        $contacts = new Contacts();
        $result = $contacts->deleteContacts($id);
        
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

    public function countContacts()
    {
        $contacts = new Contacts();
        $result = $contacts->countContacts();
        
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
            'status' => 200,
            'message' => 'OK',
            'data' => $result
        ], JSON_PRETTY_PRINT);
    }
}