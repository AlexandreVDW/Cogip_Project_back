<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
    <title>Cogip - Welcome</title>
</head>
<body>
    <main>
       <h1>Welcome to the Cogip API make by Tim, Alexandre and Okly</h1> 
       <section class="container">
       <h2>Usage</h2>
            <h3>To use the GET/POST, you can use the following routes:</h3>
            <ul>
                <li><a href="https://cogip-990e44950882.herokuapp.com/invoices">https://cogip-990e44950882.herokuapp.com/invoices</a></li>
                <li>For POST you need (ref, id_company) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/contacts">https://cogip-990e44950882.herokuapp.com/contacts</a></li>
                <li>For POST you need (name, company_id, email, phone) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/companies">https://cogip-990e44950882.herokuapp.com/companies</a></li>
                <li>For POST you need (type_id, country, tva) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/users">https://cogip-990e44950882.herokuapp.com/users</a></li>
                <li>For POST you need (first_name, last_name, role_id, email, password) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/roles">https://cogip-990e44950882.herokuapp.com/roles</a></li>
                <li>For POST you need (name) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/types">https://cogip-990e44950882.herokuapp.com/types</a></li>
                <li>For POST you need (name) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/permissions">https://cogip-990e44950882.herokuapp.com/permissions</a></li>
                <li>For POST you need (name) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com//rolespermission">https://cogip-990e44950882.herokuapp.com//rolespermission</a></li>   
                <li>For POST you need (role_id, permission_id) in the form</li>
            </ul>
            <h3>To GET, PUT or DELETE a specific data, you can use the following routes:</h3>
            <ul>
                <li><a href="https://cogip-990e44950882.herokuapp.com/invoices/{id}">https://cogip-990e44950882.herokuapp.com/invoices/{id}</a></li>
                <li>For PUT you need (ref, id_company) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/contacts/{id}">https://cogip-990e44950882.herokuapp.com/contacts/{id}</a></li>
                <li>For PUT you need (name, company_id, email, phone) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/companies/{id}">https://cogip-990e44950882.herokuapp.com/companies/{id}</a></li>
                <li>For PUT you need (type_id, country, tva) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/users/{id}">https://cogip-990e44950882.herokuapp.com/users/{id}</a></li>
                <li>For PUT you need (first_name, last_name, role_id, email, password) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/roles/{id}">https://cogip-990e44950882.herokuapp.com/roles/{id}</a></li>
                <li>For PUT you need (name) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/types/{id}">https://cogip-990e44950882.herokuapp.com/types/{id}</a></li>
                <li>For PUT you need (name) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/permissions/{id}">https://cogip-990e44950882.herokuapp.com/permissions/{id}</a></li>
                <li>For PUT you need (name) in the form</li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/rolespermission/{id}">https://cogip-990e44950882.herokuapp.com/rolespermission/{id}</a></li>
                <li>For PUT you need (role_id, permission_id) in the form</li>
            </ul>
            <p>careful with the PUT request, you need to send all the data in the form except for the date.</p>
            <h3>To GET the data into X pages of X elements, you can use the following routes:</h3>
            <ul>
                <li><a href="https://cogip-990e44950882.herokuapp.com/invoices?page=X&itemsPerPage=X">https://cogip-990e44950882.herokuapp.com/invoices?page=X&itemsPerPage=X</a></li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/contacts?page=X&itemsPerPage=X">https://cogip-990e44950882.herokuapp.com/contacts?page=X&itemsPerPage=X</a></li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/companies?page=X&itemsPerPage=X">https://cogip-990e44950882.herokuapp.com/companies?page=X&itemsPerPage=X</a></li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/users?page=X&itemsPerPage=X">https://cogip-990e44950882.herokuapp.com/users?page=X&itemsPerPage=X</a></li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/roles?page=X&itemsPerPage=X">https://cogip-990e44950882.herokuapp.com/roles?page=X&itemsPerPage=X</a></li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/types?page=X&itemsPerPage=X">https://cogip-990e44950882.herokuapp.com/types?page=X&itemsPerPage=X</a></li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/rolespermission?page=X&itemsPerPage=X">https://cogip-990e44950882.herokuapp.com/rolespermission?page=X&itemsPerPage=X</a></li>
            </ul>
            <h3>To GET the count of the data, you can use the following routes:</h3>
            <ul>
                <li><a href="https://cogip-990e44950882.herokuapp.com/invoices/count">https://cogip-990e44950882.herokuapp.com/invoices/count</a></li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/contacts/count">https://cogip-990e44950882.herokuapp.com/contacts/count</a></li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/companies/count">https://cogip-990e44950882.herokuapp.com/companies/count</a></li>
                <li><a href="https://cogip-990e44950882.herokuapp.com/users/count">https://cogip-990e44950882.herokuapp.com/users/count</a></li>
            </ul>  
       </section>
    </main>
</body>
</html>