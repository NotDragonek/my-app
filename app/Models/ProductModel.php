<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';  // Nazwa tabeli w bazie danych
    protected $primaryKey = 'id';       // Klucz główny

    protected $useAutoIncrement = true; // Automatyczne inkrementowanie
    protected $returnType     = 'array'; // Zwracanie wyników w formie tablicy
    protected $useTimestamps  = false;   // Czy używać czasów (tzn. `created_at`, `updated_at`)

    protected $allowedFields = ['name', 'description', 'price', 'category_id', 'seller_id'];  // Dozwolone pola do edycji w tabeli

    // Relacja z tabelą kategorii (Foreign key)
    public function getCategory()
    {
        return $this->belongsTo('App\Models\CategoryModel', 'category_id');
    }

    // Relacja z tabelą użytkowników (sprzedawców)
    public function getSeller()
    {
        return $this->belongsTo('App\Models\UserModel', 'seller_id');
    }

    // Metoda do pobierania produktów danej kategorii
    public function getProductsByCategory($categoryId)
    {
        return $this->where('category_id', $categoryId)->findAll();
    }
    
    // Metoda do pobierania produktów danego sprzedawcy
    public function getProductsBySeller($sellerId)
    {
        return $this->where('seller_id', $sellerId)->findAll();
    }

    // Metoda do dodawania nowego produktu
    public function addProduct($data)
    {
        return $this->insert($data);
    }

    // Metoda do edytowania produktu
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    // Metoda do usuwania produktu
    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
}
