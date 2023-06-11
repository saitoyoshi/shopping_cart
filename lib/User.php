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
    public function getName(): string {
        return $this->name;
    }
    public function getEmail(): string {
        return $this->email;
    }
    public function getCart(): Cart {
        return $this->cart;
    }
    public function checkout(): void {
        if ($this->cart->isEmpty()) {
            echo "カートが空です。" . PHP_EOL;
            return;
        }
        echo "購入を確定しました。" . PHP_EOL;
        $this->cart->clear();
    }
}
