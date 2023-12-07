<?php

namespace App\Controllers;

use App\core\Controllers;
use App\model\Contacts;

class ContactsController 
{
    public function Contacts()
    {
        $contacts = new Contacts();
        $contacts = $contacts->getAllContacts();
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