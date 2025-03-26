<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nazwa', 'cena', 'opis'];

    // Pobranie produktów na podstawie ich ID (które są przechowywane w koszyku)
    public function getProductsByIds($productIds)
    {
        return $this->whereIn('id', $productIds)->findAll();
    }
}
