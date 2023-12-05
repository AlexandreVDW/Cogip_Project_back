<?php

declare(strict_types=1);

namespace App\model;

class Invoices
{
    public int $id;
    public string $ref;
    public int $company_id;
    public datetime $created_at;
    public datetime $updated_at;

    public function __construct(int $id, string $ref, int $company_id, datetime $created_at, datetime $updated_at)
    {
        $this->id = $id;
        $this->ref = $ref;
        $this->company_id = $company_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function formatDate($date)
    {
        $date = new DateTime($date);
        return $date->format('d-m-Y H:i:s');
    }
}