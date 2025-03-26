<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nazwa', 'opis', 'cena', 'kategoria'];
    protected $useTimestamps = true;
}
