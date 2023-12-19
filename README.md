# Cogip_Project_back

## Description

This is the back-end of the Cogip project. It is a project for the BeCode training. The goal is to create a website for a fictive company called Cogip. The website will be used by the employees to manage the company's data. And we backend developers will create an api to be use by the front end.

## Installation

1. Clone the repository
2. Open the terminal and go to the folder of the project
3. Run `composer install`
4. Create a database called `cogip` and import the `cogip.sql` file
5. Create a `.env` file and add the following lines:

```env
DB_HOST="your_host"
DB_NAME="cogip"
DB_USER="your_username"
DB_PASSWORD="your_password"
```

## Usage

To use the GET/POST, you can use the following routes:

```
https://cogip-990e44950882.herokuapp.com/invoices
https://cogip-990e44950882.herokuapp.com/companies
https://cogip-990e44950882.herokuapp.com/contacts
https://cogip-990e44950882.herokuapp.com/users
https://cogip-990e44950882.herokuapp.com/roles
https://cogip-990e44950882.herokuapp.com/types
https://cogip-990e44950882.herokuapp.com/permissions
```

To GET, PUT or DELETE a specific data, you can use the following routes:

```
https://cogip-990e44950882.herokuapp.com/invoices/{id}
https://cogip-990e44950882.herokuapp.com/companies/{id}
https://cogip-990e44950882.herokuapp.com/contacts/{id}
https://cogip-990e44950882.herokuapp.com/users/{id}
https://cogip-990e44950882.herokuapp.com/roles/{id}
https://cogip-990e44950882.herokuapp.com/types/{id}
https://cogip-990e44950882.herokuapp.com/permissions/{id}
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
``` 

To GET the count of the data, you can use the following routes:

```
https://cogip-990e44950882.herokuapp.com/invoices/count
https://cogip-990e44950882.herokuapp.com/companies/count
https://cogip-990e44950882.herokuapp.com/contacts/count
https://cogip-990e44950882.herokuapp.com/users/count
```

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


