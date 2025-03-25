<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class SellerController extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        // Pobierz produkty sprzedawcy
        $products = $this->productModel->where('seller_id', session()->get('user_id'))->findAll();
        return view('seller/index', ['products' => $products]);
    }

    public function add_product()
    {
        return view('seller/add_product');
    }

    public function create_product()
    {
        // Walidacja danych przed zapisaniem
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'price' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Błąd w formularzu.');
        }

        // Zapisz produkt do bazy
        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'category_id' => $this->request->getPost('category_id'),
            'seller_id' => session()->get('user_id'),
        ];

        if ($this->productModel->insert($data)) {
            return redirect()->to('/seller')->with('success', 'Produkt dodany.');
        } else {
            return redirect()->to('/seller/add_product')->with('error', 'Błąd przy dodawaniu produktu.');
        }
    }

    public function edit_product($id)
    {
        $product = $this->productModel->find($id);
        return view('seller/edit_product', ['product' => $product]);
    }

    public function update_product($id)
    {
        // Walidacja danych przed zapisaniem
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'price' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Błąd w formularzu.');
        }

        // Zaktualizuj produkt
        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'category_id' => $this->request->getPost('category_id'),
        ];

        if ($this->productModel->update($id, $data)) {
            return redirect()->to('/seller')->with('success', 'Produkt zaktualizowany.');
        } else {
            return redirect()->to('/seller/edit_product/' . $id)->with('error', 'Błąd przy edytowaniu produktu.');
        }
    }

    public function delete_product($id)
    {
        if ($this->productModel->delete($id)) {
            return redirect()->to('/seller')->with('success', 'Produkt usunięty.');
        }
        return redirect()->to('/seller')->with('error', 'Nie udało się usunąć produktu.');
    }
}
