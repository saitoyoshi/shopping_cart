<?php

require_once __DIR__ . '/Cart.php';

class User {
    private Cart $cart;
    private string $name;
    private string $email;

    public function __construct(Cart $cart, string $name = '山田　太郎', string $email = 'user@example.co.jp')
    {
        $this->cart = $cart;
        $this->name = $name;
        $this->email = $email;
    }
    public function addItemToCart(Product $product): void {
        $this->cart->addProduct($product);
    }
    public function remoteItemFromCart(Product $product): void {
        $this->cart->removeProduct($product->getName());
    }
    public function total(): int {
        return $this->cart->total();
    }
}
