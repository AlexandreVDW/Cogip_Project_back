# Cogip_Project_back

## Description

This is the back-end of the Cogip project. It is a project for the BeCode training. The goal is to create a website for a fictive company called Cogip. The website will be used by the employees to manage the company's data. And we backend developers will create an api to be use by the front end. 

If you want get a visuel of the two front group that work with our api :

### First group : [Repository](https://github.com/Robpiot/COGIP-GP3)
- [Robpin Piot](https://github.com/robpiot)
- [Rosalie Boulard](https://github.com/RosaBld)
- [Carole Gerard](https://github.com/Carole-GRD)

[Deploy Project](https://6582c6477f821e007a1560e8--eloquent-youtiao-302ec7.netlify.app/)

### Second group : [Repository](https://github.com/Taweria/Cogip_Project)

- [Alexandre Vens](https://github.com/v-alex-dev)
- [Elodie Ali](https://github.com/Taweria)

## Contributors

- [Alexandre VDW](https://github.com/AlexandreVDW)
- [Tim Desmet](https://github.com/TimDesmet00)
- [Okly](https://github.com/Okly2023)

## Learning objectives

- Be able to create a database
- Be able to create a database schema
- Be able to create a database connection using PHP PDO
- Be able to use [Bramus Router](https://github.com/bramus/router) to create routes
- Be able to use MVC to structure code
- Be able to make a CRUD in PHP
- Be able to make a RESTful API
- Be able to deploy a PHP application

## Deployement

You can find the deploy api [here](https://cogip-990e44950882.herokuapp.com/)

## Installation

1. Clone the repository
2. Open the terminal and go to the folder of the project
3. Run `composer install`
4. Create a database called `cogip` and import the `cogip.sql` file
5. Create a `.env` file and add the following lines:

```
.env
DB_HOST="your_host"
DB_NAME="cogip"
DB_USER="your_username"
DB_PASSWORD="your_password"
```

## Usage

### To use the GET/POST, you can use the following routes:

```
https://cogip-990e44950882.herokuapp.com/invoices
For POST you need (ref, id_company) in the form
https://cogip-990e44950882.herokuapp.com/contacts
For POST you need (name, company_id, email, phone) in the form
https://cogip-990e44950882.herokuapp.com/companies
For POST you need (type_id, country, tva) in the form
https://cogip-990e44950882.herokuapp.com/users
For POST you need (first_name, last_name, role_id, email, password) in the form
https://cogip-990e44950882.herokuapp.com/roles
For POST you need (name) in the form
https://cogip-990e44950882.herokuapp.com/types
For POST you need (name) in the form
https://cogip-990e44950882.herokuapp.com/permissions
For POST you need (name) in the form
https://cogip-990e44950882.herokuapp.com//rolespermission
For POST you need (role_id, permission_id) in the form
```

To GET, PUT or DELETE a specific data, you can use the following routes:

```
https://cogip-990e44950882.herokuapp.com/invoices/{id}
For PUT you need (ref, id_company) in the form
https://cogip-990e44950882.herokuapp.com/contacts/{id}
For PUT you need (name, company_id, email, phone) in the form
https://cogip-990e44950882.herokuapp.com/companies/{id}
For PUT you need (type_id, country, tva) in the form
https://cogip-990e44950882.herokuapp.com/users/{id}
For PUT you need (first_name, last_name, role_id, email, password) in the form
https://cogip-990e44950882.herokuapp.com/roles/{id}
For PUT you need (name) in the form
https://cogip-990e44950882.herokuapp.com/types/{id}
For PUT you need (name) in the form
https://cogip-990e44950882.herokuapp.com/permissions/{id}
For PUT you need (name) in the form
https://cogip-990e44950882.herokuapp.com/rolespermission/{id}
For PUT you need (role_id, permission_id) in the form
```

careful with the PUT request, you need to send all the data in the form except for the date.


To GET the data into X pages of X elements, you can use the following routes:

```
https://cogip-990e44950882.herokuapp.com/invoices?page=X&itemsPerPage=X
https://cogip-990e44950882.herokuapp.com/companies?page=X&itemsPerPage=X
https://cogip-990e44950882.herokuapp.com/contacts?page=X&itemsPerPage=X
https://cogip-990e44950882.herokuapp.com/users?page=X&itemsPerPage=X
https://cogip-990e44950882.herokuapp.com/roles?page=X&itemsPerPage=X
https://cogip-990e44950882.herokuapp.com/types?page=X&itemsPerPage=X
https://cogip-990e44950882.herokuapp.com/permissions?page=X&itemsPerPage=X
https://cogip-990e44950882.herokuapp.com//rolespermission?page=X&itemsPerPage=X
```

To GET the count of the data, you can use the following routes:
```
https://cogip-990e44950882.herokuapp.com/invoices/count
https://cogip-990e44950882.herokuapp.com/companies/count
https://cogip-990e44950882.herokuapp.com/contacts/count
https://cogip-990e44950882.herokuapp.com/users/count
```

