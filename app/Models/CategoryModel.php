<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';  // Nazwa tabeli w bazie danych
    protected $primaryKey = 'id';         // Klucz główny

    protected $useAutoIncrement = true;   // Automatyczne inkrementowanie
    protected $returnType     = 'array';  // Zwracanie wyników w formie tablicy
    protected $useTimestamps  = false;    // Czy używać czasów (tzn. `created_at`, `updated_at`)

    protected $allowedFields = ['name', 'description'];  // Dozwolone pola do edycji w tabeli

    // Relacja z produktami (1 kategoria do wielu produktów)
    public function getProducts()
    {
        return $this->hasMany('App\Models\ProductModel', 'category_id');
    }

    // Metoda do pobierania wszystkich kategorii
    public function getAllCategories()
    {
        return $this->findAll();
    }

    // Metoda do dodawania nowej kategorii
    public function addCategory($data)
    {
        return $this->insert($data);
    }

    // Metoda do edytowania kategorii
    public function updateCategory($id, $data)
    {
        return $this->update($id, $data);
    }

    // Metoda do usuwania kategorii
    public function deleteCategory($id)
    {
        return $this->delete($id);
    }
}
