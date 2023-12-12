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
use App\Controllers\TypesController;
use App\Controllers\RolesPermissionController;

$router = new Router();

$router->options('/.*', function() {
    header("Access-Control-Allow-Origin: *"); // replace '*' with your origin as needed
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
});

$router->before('GET|POST|PUT|DELETE', '/.*', function() {
    header("Access-Control-Allow-Origin: *"); // replace '*' with your origin as needed
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
});

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
            (new ContactsController)->setNewContact();
        });
    
        // will result in '/contacts/id'
        $router->put('/(\d+)', function ($id) {
            (new ContactsController)->updateContact($id);
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
            (new UserController)->setNewUser();
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

//subrouting
$router->mount('/types', function () use ($router) {
    
    // will result in '/types'
    $router->get('/', function () {
        (new TypesController)->Types();
    });

    // will result in '/types/id'
    $router->get('/(\d+)', function ($id) {
        (new TypesController)->Type($id);
    });

    // will result in '/types/id'
    $router->post('/', function () {
        (new TypesController)->setNewTypes();
    });

    // will result in '/types/id'
    $router->put('/(\d+)', function ($id) {
        (new TypesController)->updateTypes($id);
    });

    // will result in '/types/id'
    $router->delete('/(\d+)', function ($id) {
        (new TypesController)->deleteTypes($id);
    });
});

//subrouting
$router->mount('/rolespermission', function () use ($router) {
    
    // will result in '/rolespermission'
    $router->get('/', function () {
        (new RolesPermissionController)->RolesPermission();
    });

    // will result in '/rolespermission/id'
    $router->get('/(\d+)', function ($id) {
        (new RolesPermissionController)->RolePermission($id);
    });

    // will result in '/rolespermission/id'
    $router->post('/', function () {
        (new RolesPermissionController)->setNewRolesPermission();
    });

    // will result in '/rolespermission/id'
    $router->put('/(\d+)', function ($id) {
        (new RolesPermissionController)->updateRolesPermission($id);
    });

    // will result in '/rolespermission/id'
    $router->delete('/(\d+)', function ($id) {
        (new RolesPermissionController)->deleteRolesPermission($id);
    });
});




$router->run();