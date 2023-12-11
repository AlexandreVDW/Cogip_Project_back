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
}