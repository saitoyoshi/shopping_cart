<?php

require_once __DIR__ . '/../lib/Product.php';
require_once __DIR__ . '/../lib/Cart.php';

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase {
    public function testAddProduct() {
        $product = new Product('ポテチ', 270);
        $cart = new Cart();
        $this->assertSame(0, count($cart->getProductList()));
        $cart->addProduct($product);
        $this->assertSame(1, count($cart->getProductList()));
        $this->assertTrue($cart->getProductList()[0] instanceof Product);
        $this->assertTrue(is_a($cart->getProductList()[0], 'Product'));
    }
    public function testDeleteProduct() {
        $product = new Product('ポテチ', 270);
        $cart = new Cart();
        $this->assertSame(0, count($cart->getProductList()));
        $cart->addProduct($product);
        $this->assertSame(1, count($cart->getProductList()));
        $cart->deleteProduct('ポテチ');
        $this->assertSame(0, count($cart->getProductList()));
        $cart->deleteProduct('ポテチ');
        $this->expectOutputString('すでにその商品はカートに一つも入っていません' . PHP_EOL);
    }
    public function testTotal() {
        $product1 = new Product('ポテチ', 270);
        $product2 = new Product('コーラ', 140);
        $cart = new Cart();
        $cart->addProduct($product1);
        $cart->addProduct($product2);
        $this->assertSame(451,$cart->total());
    }
}
