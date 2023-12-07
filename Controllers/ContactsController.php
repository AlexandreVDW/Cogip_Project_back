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
        echo json_encode(['contacts' => $contacts]);
    }
}