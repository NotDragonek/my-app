<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    protected $userModel;
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function products()
    {
        // Pobierz wszystkie produkty
        $products = $this->productModel->findAll();
        return view('admin/products', ['products' => $products]);
    }

    public function categories()
    {
        // Pobierz wszystkie kategorie
        $categories = $this->categoryModel->findAll();
        return view('admin/categories', ['categories' => $categories]);
    }

    public function delete_user($id)
    {
        if ($this->userModel->delete($id)) {
            return redirect()->to('/admin/users')->with('success', 'Użytkownik usunięty.');
        }
        return redirect()->to('/admin/users')->with('error', 'Nie udało się usunąć użytkownika.');
    }

    public function delete_product($id)
    {
        if ($this->productModel->delete($id)) {
            return redirect()->to('/admin/products')->with('success', 'Produkt usunięty.');
        }
        return redirect()->to('/admin/products')->with('error', 'Nie udało się usunąć produktu.');
    }

    public function delete_category($id)
    {
        if ($this->categoryModel->delete($id)) {
            return redirect()->to('/admin/categories')->with('success', 'Kategoria usunięta.');
        }
        return redirect()->to('/admin/categories')->with('error', 'Nie udało się usunąć kategorii.');
    }
}
