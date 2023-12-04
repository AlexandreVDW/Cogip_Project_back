<?php

declare(strict_types=1);

namespace App\model;

class Companies
{
    public int $id;
    public string $name;
    public string $type_id;
    public string $country;
    public string $tva;
    public datetime $created_at;
    public datetime $updated_at;

    public function __construct(int $id, string $name, string $tupe_id, string $country, string $tva, datetime $created_at, datetime $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->vat = $type_id;
        $this->country = $country;
        $this->type = $tva;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
    
    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }
}