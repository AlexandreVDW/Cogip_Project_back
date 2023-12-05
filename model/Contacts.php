<?php

declare(strict_types=1);

namespace App\model;

class Contacts
{
    public int $id;
    public string $name;
    public int $company_id;
    public string $email;
    public string $phone;
    public datetime $created_at;
    public datetime $updated_at;

    public function __construct(int $id, string $name, int $company_id, string $email, string $phone, datetime $created_at, datetime $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->company_id = $company_id;
        $this->email = $email;
        $this->phone = $phone;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }
}