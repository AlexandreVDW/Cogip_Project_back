<?php

namespace App\Routes;

use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Controllers\ContactsController;

$router = new Router();

$router->get('/', function() {
    (new HomeController)->index();
});

// Subrouting
$router->mount('/invoices', function () use ($router) {

    // will result in '/invoices'
    $router->get('/', function () {
        (new InvoicesController)->Invoices();
    });

    // will result in '/invoices/id'
    $router->get('/(\d+)', function ($id) {
        (new InvoicesController)->Invoice($id);
    });

    // will result in '/invoices/id'
    $router->post('/', function () {
        (new InvoicesController)->setNewInvoices();
    });

    // will result in '/invoices/id'
    $router->put('/(\d+)', function ($id) {
        (new InvoicesController)->updateInvoices($id);
    });

    // will result in '/invoices/id'
    $router->delete('/(\d+)', function ($id) {
        (new InvoicesController)->deleteInvoices($id);
    });
});

// Subrouting
$router->mount('/contacts', function () use ($router) {
    
        // will result in '/contacts'
        $router->get('/', function () {
            (new ContactsController)->Contacts();
        });
    
        // will result in '/contacts/id'
        $router->get('/(\d+)', function ($id) {
            (new ContactsController)->Contact($id);
        });
    
        // will result in '/contacts/id'
        $router->post('/', function () {
            (new ContactsController)->setNewContacts();
        });
    
        // will result in '/contacts/id'
        $router->put('/(\d+)', function ($id) {
            (new ContactsController)->updateContacts($id);
        });
    
        // will result in '/contacts/id'
        $router->delete('/(\d+)', function ($id) {
            (new ContactsController)->deleteContacts($id);
        });
});


$router->run();