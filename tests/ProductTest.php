<?php

require_once __DIR__ . '/../lib/Product.php';

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase {
    public function testGetName() {
        $product = new Product('ポテチ', 270);
        $this->assertSame('ポテチ', $product->getName());
    }
    public function testGetPrice() {
        $product = new Product('ポテチ', 270);
        $this->assertSame(270,$product->getPrice());
    }
}
