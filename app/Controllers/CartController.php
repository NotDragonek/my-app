<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CartModel;

class CartController extends BaseController
{
    protected $productModel;
    protected $cartModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->cartModel = new CartModel();
    }

    // Dodaj produkt do koszyka
    public function add_to_cart($product_id)
    {
        $ilosc = $this->request->getPost('quantity');  // Pobieramy ilość poprawnie
    
        if (!$ilosc || $ilosc < 1) {
            return redirect()->to('/cart/view')->with('error', 'Niepoprawna ilość!');
        }
    
        $user_id = session()->get('user_id');  
    
        $this->cartModel->addToCart($user_id, $product_id, (int) $ilosc);
    
        return redirect()->to('/cart/view')->with('success', 'Produkt dodany do koszyka!');
    }

    // Wyświetlanie koszyka
    public function view_cart()
    {
        $user_id = session()->get('user_id');
        $cartItems = $this->cartModel->getCartItems($user_id);
        $products = [];
        
        foreach ($cartItems as $item) {
            $product = $this->productModel->find($item['product_id']);
            $product['quantity_in_cart'] = $item['ilosc'];
            $products[] = $product;
        }

        return view('cart/index', ['products' => $products]);
    }

    // Usuwanie przedmiotu z koszyka
    public function remove_item($product_id)
    {
        $user_id = session()->get('user_id');
        $this->cartModel->removeItem($user_id, $product_id);

        return redirect()->to('/cart/view')->with('success', 'Produkt usunięty z koszyka!');
    }

    // Zakup produktów
    public function purchase()
    {
        $user_id = session()->get('user_id');
        $cartItems = $this->cartModel->getCartItems($user_id);
    
        if (empty($cartItems)) {
            return redirect()->to('/cart/view')->with('error', 'Twój koszyk jest pusty!');
        }
    
        foreach ($cartItems as $item) {
            $product = $this->productModel->find($item['product_id']);
    
            if (!$product) {
                return redirect()->to('/cart/view')->with('error', 'Produkt nie istnieje!');
            }
    
            if ($product['ilosc'] < $item['ilosc']) {
                return redirect()->to('/cart/view')->with('error', 'Brak towaru: ' . $product['nazwa']);
            }
    
            // Zaktualizowanie ilości produktu w bazie danych
            $new_quantity = $product['ilosc'] - $item['ilosc'];
            $this->productModel->update($item['product_id'], ['ilosc' => $new_quantity]);
    
            // Jeśli ilość produktu w magazynie spadnie do 0, usuń go
            if ($new_quantity <= 0) {
                $this->productModel->delete($item['product_id']);
            }
    
            // Usunięcie pozycji z koszyka
            $this->cartModel->removeItem($user_id, $item['product_id']);
        }
    
        return redirect()->to('/cart/view')->with('success', 'Zakup zakończony pomyślnie!');
    }
    

    // Wyczyszczenie koszyka
    public function clear_cart()
    {
        $user_id = session()->get('user_id');
        $this->cartModel->clearCart($user_id);

        return redirect()->to('/cart/view')->with('success', 'Koszyk został wyczyszczony!');
    }
}
