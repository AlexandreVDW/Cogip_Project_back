<?php

declare(strict_types=1);

namespace App\model;

class Roles
{
    public int $id;
    public string $name;
    public datetime $created_at;
    public datetime $updated_at;

    public function __construct(int $id, string $name, datetime $created_at, datetime $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }
}