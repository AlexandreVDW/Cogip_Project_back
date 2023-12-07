<?php

namespace App\Routes;

use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Controllers\ContactsController;
use App\Controllers\UserController;
use App\Controllers\CompaniesController;
use App\Controllers\RolesController;
use App\Controllers\PermissionController;

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

// Subrouting
$router->mount('/users', function () use ($router) {
    
        // will result in '/users'
        $router->get('/', function () {
            (new UserController)->Users();
        });
    
        // will result in '/users/id'
        $router->get('/(\d+)', function ($id) {
            (new UserController)->User($id);
        });
    
        // will result in '/users/id'
        $router->post('/', function () {
            (new UserController)->setNewUsers();
        });
    
        // will result in '/users/id'
        $router->put('/(\d+)', function ($id) {
            (new UserController)->updateUser($id);
        });
    
        // will result in '/users/id'
        $router->delete('/(\d+)', function ($id) {
            (new UserController)->deleteUsers($id);
        });
});

// Subrouting
$router->mount('/companies', function () use ($router) {
    
    // will result in '/companies'
    $router->get('/', function () {
        (new CompaniesController)->Companies();
    });

    // will result in '/companies/id'
    $router->get('/(\d+)', function ($id) {
        (new CompaniesController)->Companie($id);
    });

    // will result in '/companies/id'
    $router->post('/', function () {
        (new CompaniesController)->setNewCompanies();
    });

    // will result in '/companies/id'
    $router->put('/(\d+)', function ($id) {
        (new CompaniesController)->updateCompanies($id);
    });

    // will result in '/companies/id'
    $router->delete('/(\d+)', function ($id) {
        (new CompaniesController)->deleteCompanies($id);
    });
});

//subrouting
$router->mount('/roles', function () use ($router) {
    
    // will result in '/roles'
    $router->get('/', function () {
        (new RolesController)->Roles();
    });

    // will result in '/roles/id'
    $router->get('/(\d+)', function ($id) {
        (new RolesController)->Role($id);
    });

    // will result in '/roles/id'
    $router->post('/', function () {
        (new RolesController)->setNewRoles();
    });

    // will result in '/roles/id'
    $router->put('/(\d+)', function ($id) {
        (new RolesController)->updateRoles($id);
    });

    // will result in '/roles/id'
    $router->delete('/(\d+)', function ($id) {
        (new RolesController)->deleteRoles($id);
    });
});

//subrouting
$router->mount('/permissions', function () use ($router) {
    
    // will result in '/permissions'
    $router->get('/', function () {
        (new PermissionController)->Permissions();
    });

    // will result in '/permissions/id'
    $router->get('/(\d+)', function ($id) {
        (new PermissionController)->Permission($id);
    });

    // will result in '/permissions/id'
    $router->post('/', function () {
        (new PermissionController)->setNewPermission();
    });

    // will result in '/permissions/id'
    $router->put('/(\d+)', function ($id) {
        (new PermissionController)->updatePermission($id);
    });

    // will result in '/permissions/id'
    $router->delete('/(\d+)', function ($id) {
        (new PermissionController)->deletePermission($id);
    });
});




$router->run();