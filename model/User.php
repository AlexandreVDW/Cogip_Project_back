<?php

declare(strict_types=1);

namespace App\model;

class User 
{
    public int $id;
    public string $first_name;
    public int $role_id;
    public string $last_name;
    public string $email;
    public string $password;
    public datetime $created_at;
    public datetime $updated_at;

    public function __construct(int $id, string $first_name, int $role_id, string $last_name, string $email, string $password, datetime $created_at, datetime $updated_at)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->role_id = $role_id;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
    
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }
}