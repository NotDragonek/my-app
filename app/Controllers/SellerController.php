<?php

namespace App\Controllers;

use App\Models\ProductModel;

class SellerController extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    // Dashboard sprzedawcy
    public function index()
    {
        $products = $this->productModel->where('seller_id', session()->get('user_id'))->findAll();

        return view('seller/dashboard', ['products' => $products]);
    }

    // Formularz dodawania produktu
    public function add_product()
    {
        return view('seller/add_product');
    }

    // Przetwarzanie dodawania produktu
    public function save_product()
    {
        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'category_id' => $this->request->getPost('category'),
            'seller_id'   => session()->get('user_id'), // Pobranie ID zalogowanego sprzedawcy
        ];

        $this->productModel->insert($data);
        return redirect()->to('/seller')->with('success', 'Produkt dodany!');
    }

    // Edycja produktu
    public function edit_product($id)
    {
        $product = $this->productModel->find($id);

        if (!$product || $product['seller_id'] != session()->get('user_id')) {
            return redirect()->to('/seller')->with('error', 'Brak dostępu.');
        }

        return view('seller/edit_product', ['product' => $product]);
    }

    // Zapisanie edytowanego produktu
    public function update_product($id)
    {
        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'category_id' => $this->request->getPost('category'),
        ];

        $this->productModel->update($id, $data);
        return redirect()->to('/seller')->with('success', 'Produkt zaktualizowany!');
    }

    // Usunięcie produktu
    public function delete_product($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/seller')->with('success', 'Produkt usunięty!');
    }
}
