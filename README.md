# Cogip_Project_back

## Description

This is the back-end of the Cogip project. It is a project for the BeCode training. The goal is to create a website for a fictive company called Cogip. The website will be used by the employees to manage the company's data. And we backend developers will create an api to be use by the front end. 

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

#### For the invoices :

| Endpoint | Méthode | Paramètres (pour POST) | Description |
|----------|---------|-------------------------|-------------|
| /invoices | GET     | -                       | Récupère toutes les factures |
| /invoices | POST    | ref, id_company         | Crée une nouvelle facture |
| /invoices/{id} | GET | -                       | Récupère une facture spécifique |
| /invoices/{id} | PUT | ref, id_company (sauf la date) | Met à jour une facture spécifique |
| /invoices/{id} | DELETE | -                     | Supprime une facture spécifique |
| /invoices/count | GET | -                       | Récupère le nombre total de factures |
| /invoices?page=X&itemsPerPage=X | GET | -       | Récupère les données paginées |

#### For the contacts :

| Endpoint | Méthode | Paramètres (pour POST) | Description |
|----------|---------|-------------------------|-------------|
| /contacts | GET     | -                       | Récupère tous les contacts |
| /contacts | POST    | name, company_id, email, phone | Crée un nouveau contact |
| /contacts/{id} | GET | -                       | Récupère un contact spécifique |
| /contacts/{id} | PUT | name, company_id, email, phone | Met à jour un contact spécifique |
| /contacts/{id} | DELETE | -                    | Supprime un contact spécifique |
| /contacts/count | GET | -                       | Récupère le nombre total de contacts |
| /contacts?page=X&itemsPerPage=X | GET | -       | Récupère les données paginées |

#### For the companies :

| Endpoint | Méthode | Paramètres (pour POST) | Description |
|----------|---------|-------------------------|-------------|
| /companies | GET     | -                       | Récupère toutes les entreprises |
| /companies | POST    | type_id, country, tva   | Crée une nouvelle entreprise |
| /companies/{id} | GET | -                       | Récupère une entreprise spécifique |
| /companies/{id} | PUT | type_id, country, tva   | Met à jour une entreprise spécifique |
| /companies/{id} | DELETE | -                    | Supprime une entreprise spécifique |
| /companies/count | GET | -                       | Récupère le nombre total d'entreprises |
| /companies?page=X&itemsPerPage=X | GET | -       | Récupère les données paginées |

#### For the users :

| Endpoint | Méthode | Paramètres (pour POST) | Description |
|----------|---------|-------------------------|-------------|
| /users   | GET     | -                       | Récupère tous les utilisateurs |
| /users   | POST    | first_name, last_name, role_id, email, password | Crée un nouvel utilisateur |
| /users/{id} | GET | -                       | Récupère un utilisateur spécifique |
| /users/{id} | PUT | first_name, last_name, role_id, email, password | Met à jour un utilisateur spécifique |
| /users/{id} | DELETE | -                    | Supprime un utilisateur spécifique |
| /users/count | GET | -                       | Récupère le nombre total d'utilisateurs |
| /users?page=X&itemsPerPage=X | GET | -       | Récupère les données paginées |

#### For the roles :

| Endpoint | Méthode | Paramètres (pour POST) | Description |
|----------|---------|-------------------------|-------------|
| /roles   | GET     | -                       | Récupère tous les rôles |
| /roles   | POST    | name                    | Crée un nouveau rôle |
| /roles/{id} | GET | -                       | Récupère un rôle spécifique |
| /roles/{id} | PUT | name                    | Met à jour un rôle spécifique |
| /roles/{id} | DELETE | -                    | Supprime un rôle spécifique |
| /roles/count | GET | -                       | Récupère le nombre total de rôles |
| /roles?page=X&itemsPerPage=X | GET | -       | Récupère les données paginées |

#### For the types :

| Endpoint | Méthode | Paramètres (pour POST) | Description |
|----------|---------|-------------------------|-------------|
| /types   | GET     | -                       | Récupère tous les types |
| /types   | POST    | name                    | Crée un nouveau type |
| /types/{id} | GET | -                       | Récupère un type spécifique |
| /types/{id} | PUT | name                    | Met à jour un type spécifique |
| /types/{id} | DELETE | -                    | Supprime un type spécifique |
| /types/count | GET | -                       | Récupère le nombre total de types |
| /types?page=X&itemsPerPage=X | GET | -       | Récupère les données paginées |

#### For the permissions :

| Endpoint | Méthode | Paramètres (pour POST) | Description |
|----------|---------|-------------------------|-------------|
| /permissions | GET     | -                       | Récupère toutes les permissions |
| /permissions | POST    | name                    | Crée une nouvelle permission |
| /permissions/{id} | GET | -                       | Récupère une permission spécifique |
| /permissions/{id} | PUT | name                    | Met à jour une permission spécifique |
| /permissions/{id} | DELETE | -                    | Supprime une permission spécifique |
| /permissions/count | GET | -                       | Récupère le nombre total de permissions |
| /permissions?page=X&itemsPerPage=X | GET | -       | Récupère les données paginées |

#### For the rolespermissions :

| Endpoint | Méthode | Paramètres (pour POST) | Description |
|----------|---------|-------------------------|-------------|
| /rolespermission | GET     | -                       | Récupère toutes les associations entre rôles et permissions |
| /rolespermission | POST    | role_id, permission_id | Crée une nouvelle association entre rôle et permission |
| /rolespermission/{id} | GET | -                       | Récupère une association spécifique entre rôle et permission |
| /rolespermission/{id} | PUT | role_id, permission_id | Met à jour une association spécifique entre rôle et permission |
| /rolespermission/{id} | DELETE | -                    | Supprime une association spécifique entre rôle et permission |
| /rolespermission/count | GET | -                       | Récupère le nombre total d'associations entre rôles et permissions |
| /rolespermission?page=X&itemsPerPage=X | GET | -       | Récupère les données paginées d'associations entre rôles et permissions |

## Front part of the project :

If you want get a visuel of the two front group that work with our api :

### First group : 
- [Robpin Piot](https://github.com/robpiot)
- [Rosalie Boulard](https://github.com/RosaBld)
- [Carole Gerard](https://github.com/Carole-GRD)

[Repository link](https://github.com/Robpiot/COGIP-GP3)
[Deploy Project](https://6582c6477f821e007a1560e8--eloquent-youtiao-302ec7.netlify.app/)

### Second group : 

- [Alexandre Vens](https://github.com/v-alex-dev)
- [Elodie Ali](https://github.com/Taweria)

[Repository link](https://github.com/Taweria/Cogip_Project)



