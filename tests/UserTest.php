<?php

require_once __DIR__ . '/../lib/Product.php';
require_once __DIR__ . '/../lib/Cart.php';
require_once __DIR__ . '/../lib/User.php';

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    public function testCheckoutCartIsEmpty() {
        $cart = new Cart();
        $user = new User($cart);
        $user->checkout();
        $this->expectOutputString("カートが空です。" . PHP_EOL);
    }
    public function testCheckoutCartIsNotEmpty() {
        $cart = new Cart();
        $user = new User($cart);
        $product = new Product('ポテチ', 270);
        $cart->addProduct($product);
        $user->checkout();
        $this->expectOutputString("購入を確定しました。" . PHP_EOL);
    }
}
