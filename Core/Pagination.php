<?php
namespace App\Core;

class Pagination {
    private $page;
    private $itemsPerPage;

    public function __construct($itemsPerPage = 100) {
        $this->itemsPerPage = $itemsPerPage;
    }
    
    public function setPage($page) {
        $this->page = $page;
    }

    public function setItemsPerPage($itemsPerPage) {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getItemsPerPage() {
        return [$this->itemsPerPage, ($this->page - 1) * $this->itemsPerPage];
    }
}