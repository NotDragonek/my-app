<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        // Inicjalizacja modelu produktu
        $this->productModel = new ProductModel();
    }

    // Wyświetlenie strony głównej
    public function index()
    {
        // Pobranie przykładowych produktów
        $products = $this->productModel->findAll(); // Możesz dodać ograniczenie na liczbę produktów, np. limit 4

        return view('home/index', ['products' => $products]);
    }
}
