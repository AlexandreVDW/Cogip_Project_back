<?php

namespace App\Routes;

use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;

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

$router->run();