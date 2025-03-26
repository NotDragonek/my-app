<?php

namespace App\Controllers;

use App\Models\CartModel;

class CartController extends BaseController
{
    protected $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    // Metoda do wyświetlania koszyka
    public function index()
    {
        // Pobranie produktów w koszyku (ID produktów są przechowywane w sesji)
        $cartItems = session()->get('cart_items') ?? [];
        $productIds = array_column($cartItems, 'id');  // Pobieramy tylko ID produktów z koszyka

        if (!empty($productIds)) {
            // Pobieramy dane produktów z bazy danych
            $products = $this->cartModel->getProductsByIds($productIds);
        } else {
            $products = [];
        }

        // Łączenie danych o produktach z ilościami z koszyka
        foreach ($cartItems as &$item) {
            foreach ($products as $product) {
                if ($product['id'] == $item['id']) {
                    $item['nazwa'] = $product['nazwa'];
                    $item['cena'] = $product['cena'];
                    $item['opis'] = $product['opis'];
                    break;
                }
            }
        }

        // Obliczanie całkowitej ceny
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['cena'] * $item['quantity'];
        }

        return view('cart/index', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }

    // Metoda do aktualizacji ilości produktów w koszyku
    public function update($id)
    {
        $cartItems = session()->get('cart_items') ?? [];

        // Zaktualizowanie ilości produktu
        foreach ($cartItems as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = $this->request->getPost('quantity');
                break;
            }
        }

        session()->set('cart_items', $cartItems);

        return redirect()->to('/cart');
    }

    // Metoda do usuwania produktu z koszyka
    public function remove($id)
    {
        $cartItems = session()->get('cart_items') ?? [];

        // Usunięcie produktu
        $cartItems = array_filter($cartItems, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        session()->set('cart_items', $cartItems);

        return redirect()->to('/cart');
    }
}
