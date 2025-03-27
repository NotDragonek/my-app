<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    protected $productModel;
    protected $userModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
    }

    // Dashboard administratora
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    // Zarządzanie produktami
    public function products()
    {
        $products = $this->productModel->findAll();
        return view('admin/products', ['products' => $products]);
    }

    public function edit_product($id)
    {
        // Pobierz produkt do edycji
        $product = $this->productModel->find($id);
        
        // Jeśli produkt nie istnieje, przekieruj z błędem
        if (!$product) {
            return redirect()->to('/admin/products')->with('error', 'Produkt nie istnieje');
        }

        // Wyświetlenie formularza edycji produktu
        return view('admin/edit_product', ['product' => $product]);
    }

    // Zapisz zmiany w produkcie
    public function update_product($id)
    {
        // Walidacja danych
        $data = [
            'nazwa' => $this->request->getPost('name'),
            'opis' => $this->request->getPost('description'),
            'cena' => $this->request->getPost('price'),
            'kategoria' => $this->request->getPost('category'),
            'ilosc' => $this->request->getPost('quantity'),
        ];

        // Aktualizacja produktu
        $this->productModel->update($id, $data);

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->to('/admin/products')->with('success', 'Produkt zaktualizowany!');
    }

    // Zarządzanie użytkownikami
    public function users()
    {
        $users = $this->userModel->findAll();
        return view('admin/users', ['users' => $users]);
    }

    // Usuwanie produktu
    public function delete_product($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/admin/products')->with('success', 'Produkt usunięty!');
    }

    // Usuwanie użytkownika
    public function delete_user($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/admin/users')->with('success', 'Użytkownik usunięty!');
    }
}
