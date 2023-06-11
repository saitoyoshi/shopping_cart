<?php

require_once __DIR__ . '/../lib/Product.php';
require_once __DIR__ . '/../lib/Cart.php';
require_once __DIR__ . '/../lib/User.php';

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    public function testTotal() {
        $product = new Product('ポテチ', 270);
        $cart = new Cart();
        $user = new User($cart);
        $user->addItemToCart($product);
        $user->addItemToCart($product);
        $this->assertSame(594,$user->total());
    }
    public function testRemoveProduct() {
        $product = new Product('ポテチ', 270);
        $cart = new Cart();
        $user = new User($cart);
        $user->addItemToCart($product);
        $user->addItemToCart($product);
        $user->addItemToCart($product);
        $user->removeItemFromCart($product);
        $this->assertSame(594,$user->total());
    }
}
