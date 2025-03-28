<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'ilosc'];

    public function getCartItems($user_id)
    {
        return $this->where('user_id', $user_id)->findAll();
    }

    public function addToCart($user_id, $product_id, $quantity)
    {
        $existingItem = $this->where('user_id', $user_id)->where('product_id', $product_id)->first();
        if ($existingItem) {
            // Jeśli produkt już jest w koszyku, zaktualizuj ilość
            $this->update($existingItem['id'], ['ilosc' => $existingItem['ilosc'] + $quantity]);
        } else {
            // Jeśli produkt nie jest w koszyku, dodaj go
            $this->insert(['user_id' => $user_id, 'product_id' => $product_id, 'ilosc' => $quantity]);
        }
    }

    public function clearCart($user_id)
    {
        return $this->where('user_id', $user_id)->delete();
    }

    public function removeItem($user_id, $product_id)
    {
        return $this->where('user_id', $user_id)->where('product_id', $product_id)->delete();
    }

    public function updateQuantity($user_id, $product_id, $quantity)
    {
        return $this->where('user_id', $user_id)->where('product_id', $product_id)->set('ilosc', $quantity)->update();
    }
}
