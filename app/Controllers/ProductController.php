<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        // Inicjalizacja modelu
        $this->productModel = new ProductModel();
    }

    // Wyświetlenie listy produktów
    public function index()
    {
        $products = $this->productModel->findAll();
        return view('products/list', ['products' => $products]);
    }

    // Wyświetlenie formularza dodawania produktu
    public function add()
    {
        return view('products/add');
    }

    // Zapisanie nowego produktu
    public function save()
    {
        $productData = [
            'name'        => $this->request->getPost('nazwa'),
            'description' => $this->request->getPost('opis'),
            'price'       => $this->request->getPost('cena'),
            'category_id' => $this->request->getPost('kategoria')
        ];

        $this->productModel->save($productData);

        return redirect()->to('/product/list');
    }

    // Wyświetlenie formularza edycji produktu
    public function edit($id)
    {
        $product = $this->productModel->find($id);
        return view('products/edit', ['product' => $product]);
    }

    // Zaktualizowanie produktu
    public function update($id)
    {
        $productData = [
            'name'        => $this->request->getPost('nazwa'),
            'description' => $this->request->getPost('opis'),
            'price'       => $this->request->getPost('cena'),
            'category_id' => $this->request->getPost('kategoria')
        ];

        $this->productModel->update($id, $productData);

        return redirect()->to('/product/list');
    }

    // Usunięcie produktu
    public function delete($id)
    {
        $this->productModel->delete($id);

        return redirect()->to('/product/list');
    }
}
